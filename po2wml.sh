#!/bin/bash
#
# Author: Runa Sandvik, <runa.sandvik@gmail.com>
# Google Summer of Code 2009
#
# This is Free Software (GPLv3)
# http://www.gnu.org/licenses/gpl-3.0.txt
#
# This script will convert all the translated po files back to wml
# files.
#
# For more information, see the HOWTO and README in
# translation/tools/gsoc09.
#

### start config ###

# Location of the wml files
wmldir="$PWD"

# Location of the po files,
podir="`dirname $wmldir`/translation/projects/website/po"

# A lot of the wml files have custom tags. These tags have been defined
# in website/include/versions.wmi. Tags that people usually forget to close,
# as well as tags that are not defined in versions.wmi have been added.
# See: https://svn.torproject.org/svn/website/trunk/include/versions.wmi
customtag=`echo $(cat "$wmldir/include/versions.wmi" | awk '{ printf "<%s> " , $2 }' | sed 's/<>//g') "<svnsandbox> <svnwebsite> <svnprojects> <input> <hr> <br> <img> <gitblob>"`

# We also need to use the nodefault option of po4a; space separated list
# of tags that the module should not try to set by default in any
# category. For now, we only need the input tag.
nodefault='<input>'

### end config ###

# Create a lockfile to make sure that only one instance of the script
# can run at any time.
LOCKFILE=po2wml.lock

if lockfile -! -l 60 -r 3 "$LOCKFILE";
then
	echo "unable to acquire lock" >2
	exit 1
fi

trap "rm -f '$PWD/$LOCKFILE'" exit

# Check if translation/projects/website exist, i.e. has been checked out
if [ ! -d $podir ]
then
	echo "Have you remembered to check out translation/projects/website?"
	exit 1
fi

# cd to the right directory so we can commit the files later
cd "$wmldir"

# We need to find the po files
po=`find $podir -regex '^'$podir'/.*/.*\.po' -type f`

# For every wml, update po
for file in $po ; do

	# Validate input and write results to a log file
	validate_script="`dirname $wmldir`/translation/tools/validate.py"
	validate_log="`dirname $wmldir`/validate/website-validate.log"
	python "$validate_script" -i "$file" -l	"$validate_log"

	# Get the basename of the file we are dealing with
	pofile=`basename $file`

	# Strip the file for its original extension and the translation
	# priority, and add .wml
	wmlfile="`echo $pofile | cut -d . -f 2`.wml"

	# Find out what directory the file is in.
	indir=`dirname $file`

	# We also need to know what one directory up is
	onedirup=`dirname $indir`

	# We need to find out what subdirectory we are in
	subdir=`dirname $file | sed "s#$onedirup/##"`

	# And which language we are dealing with
	lang=`dirname $indir | sed "s#$podir/##"`

	# Time to write the translated wml file.
	# The translated document is written if 80% or more of the po
	# file has been translated. Example: Use '-k 21' to set this
	# number down to 21%. Also, po4a-translate will only write the
	# translated document if 80% or more has been translated.
	# However, it will delete the wml if less than 80% has been
	# translated. To avoid having our current, translated wml files
	# deleted, convert the po to a temp wml first. If this file was
	# actually written, rename it to wml.

	# Convert translations to directories such as website/nb/.
	function nosubdir {
		# The location of the english wml file
		english="$wmldir/en/$wmlfile"

		# Convert the translated file. Note that po4a will write the file and then delete it if less than 80% has been translated
		po4a-translate -f wml -m "$english" -p "$file" -l "$wmldir/$subdir/$wmlfile" --master-charset utf-8 -L utf-8 -o customtag="$customtag" -o nodefault="$nodefault"

		# Check to see if the file was written
                if [ -e "$wmldir/$subdir/$wmlfile" ]
		then
                        # Remove last three lines in file
			sed -i -e :a -e '$d;N;2,3ba' -e 'P;D' "$wmldir/$subdir/$wmlfile"

			# If the file is mirrors.wml, include mirrors-table.wmi
			if [ $wmlfile == "mirrors.wml" ]
			then
				sed -i 's/<!--PO4ASHARPBEGIN/#/' "$wmldir/$subdir/$wmlfile"
				sed -i 's/PO4ASHARPEND-->//' "$wmldir/$subdir/$wmlfile"
			fi

			# Include the English footer for most of the
			# translations
			if [[ $subdir != "ar" && $subdir != "pl" && $subdir != "de" && $subdir != "fa" ]]
			then
				echo '#include "foot.wmi"' >> "$wmldir/$subdir/$wmlfile"
			fi

			# If the translation is Polish, include the
			# correct header, menu files and footer
			if [ $subdir = "pl" ]
			then
				# Head
				orig_head=`grep '#include "head.wmi"' "$wmldir/$subdir/$wmlfile"`
				new_head=`echo $orig_head | sed s@head.wmi@pl/head.wmi@`
				sed -i "s@$orig_head@$new_head@" "$wmldir/$subdir/$wmlfile"

				# Side (not all files include this)
				orig_side=`grep '#include "side.wmi"' "$wmldir/$subdir/$wmlfile"`
				if [ -n "$orig_side" ]
				then
					new_side=`echo '#include "pl/side.wmi"'`
					sed -i "s@$orig_side@$new_side@" "$wmldir/$subdir/$wmlfile"
				fi

				# Info (not all files include this)
				orig_info=`grep '#include "info.wmi"' "$wmldir/$subdir/$wmlfile"`
				if [ -n "$orig_info" ]
				then
					new_info=`echo '#include "pl/info.wmi"'`
					sed -i "s@$orig_info@$new_info@" "$wmldir/$subdir/$wmlfile"
				fi

				# Footer
				echo '#include "pl/foot.wmi"' >> "$wmldir/$subdir/$wmlfile"
			fi

                        # If the translation is German, include the
                        # correct header, menu files and footer
                        if [ $subdir = "de" ]
                        then
                                # Head
                                orig_head=`grep '#include "head.wmi"' "$wmldir/$subdir/$wmlfile"`
                                new_head=`echo $orig_head | sed s@head.wmi@de/head.wmi@`
                                sed -i "s@$orig_head@$new_head@" "$wmldir/$subdir/$wmlfile"

                                # Side (not all files include this)
                                orig_side=`grep '#include "side.wmi"' "$wmldir/$subdir/$wmlfile"`
                                if [ -n "$orig_side" ]
                                then
                                        new_side=`echo '#include "de/side.wmi"'`
                                        sed -i "s@$orig_side@$new_side@" "$wmldir/$subdir/$wmlfile"
                                fi

                                # Info (not all files include this)
                                orig_info=`grep '#include "info.wmi"' "$wmldir/$subdir/$wmlfile"`
                                if [ -n "$orig_info" ]
                                then
                                        new_info=`echo '#include "de/info.wmi"'`
                                        sed -i "s@$orig_info@$new_info@" "$wmldir/$subdir/$wmlfile"
                                fi

                                # Footer
                                echo '#include "de/foot.wmi"' >> "$wmldir/$subdir/$wmlfile"
                        fi

			# If the translation is Arabic, include the
			# correct header, css, menu files and footer
			if [ $subdir = "ar" ]
			then
				# Head
				orig_head=`grep '#include "head.wmi"' "$wmldir/$subdir/$wmlfile"`
				temp_head=`echo $orig_head | sed s@head.wmi@ar/head.wmi@`
				new_head=`echo $temp_head 'STYLESHEET="css/master-rtl.min.css"'`
				sed -i "s@$orig_head@$new_head@" "$wmldir/$subdir/$wmlfile"

				# Side (not all files include this)
				orig_side=`grep '#include "side.wmi"' "$wmldir/$subdir/$wmlfile"`
				if [ -n "$orig_side" ]
				then
					new_side=`echo '#include "ar/side.wmi"'`
					sed -i "s@$orig_side@$new_side@" "$wmldir/$subdir/$wmlfile"
				fi

				# Info (not all files include this)
				orig_info=`grep '#include "info.wmi"' "$wmldir/$subdir/$wmlfile"`
				if [ -n "$orig_info" ]
				then
					new_info=`echo '#include "ar/info.wmi"'`
					sed -i "s@$orig_info@$new_info@" "$wmldir/$subdir/$wmlfile"
				fi

				# Footer
				echo '#include "ar/foot.wmi"' >> "$wmldir/$subdir/$wmlfile"
			fi

			# If the translation is Farsi, include the
			# correct header, css, menu files and footer
			if [ $subdir = "fa" ]
			then
				# Head
				orig_head=`grep '#include "head.wmi"' "$wmldir/$subdir/$wmlfile"`
				temp_head=`echo $orig_head | sed s@head.wmi@fa/head.wmi@`
				new_head=`echo $temp_head 'STYLESHEET="css/master-rtl.min.css"'`
				sed -i "s@$orig_head@$new_head@" "$wmldir/$subdir/$wmlfile"

				# Side (not all files include this)
				orig_side=`grep '#include "side.wmi"' "$wmldir/$subdir/$wmlfile"`
				if [ -n "$orig_side" ]
				then
					new_side=`echo '#include "fa/side.wmi"'`
					sed -i "s@$orig_side@$new_side@" "$wmldir/$subdir/$wmlfile"
				fi

				# Info (not all files include this)
				orig_info=`grep '#include "info.wmi"' "$wmldir/$subdir/$wmlfile"`
				if [ -n "$orig_info" ]
				then
					new_info=`echo '#include "fa/info.wmi"'`
					sed -i "s@$orig_info@$new_info@" "$wmldir/$subdir/$wmlfile"
				fi

				# Footer
				echo '#include "fa/foot.wmi"' >> "$wmldir/$subdir/$wmlfile"
			fi

			# If the directory does not include sidenav.wmi,
			# copy it from the English directory (only if
			# the English directory has this file)
			if [[ ! -e "$wmldir/$subdir/sidenav.wmi" && -e "$wmldir/en/sidenav.wmi" ]]
			then
				cp "$wmldir/en/sidenav.wmi" "$wmldir/$subdir"
			fi
		fi
	}

	# Convert translations to directories such as website/torbrowser/nb/.
	# Again, po4a will write the file and then delete it if less than 80% has been translated
	function subdir {
		# The location of the english wml file
                english="$wmldir/$subdir/en/$wmlfile"

		# Convert the files
		if [ $wmlfile = "download.wml" ]
		then
			po4a-translate -f wml -m "$english" -p "$file" -l "$wmldir/$subdir/$lang/$wmlfile" --master-charset utf-8 -L utf-8 -o customtag="$customtag" -o nodefault="$nodefault" -o ontagerror="silent"
		else
			po4a-translate -f wml -m "$english" -p "$file" -l "$wmldir/$subdir/$lang/$wmlfile" --master-charset utf-8 -L utf-8 -o customtag="$customtag" -o nodefault="$nodefault"
		fi

		# Check to see if the file was written
		if [ -e "$wmldir/$subdir/$lang/$wmlfile" ]
		then
			# Remove last three lines in file
			sed -i -e :a -e '$d;N;2,3ba' -e 'P;D' "$wmldir/$subdir/$lang/$wmlfile"

			# Remove a specific comment from a specific file
			if [ $wmlfile == "download-easy.wml" ]
			then
				translator_comment="# Translators: please point to the version of TBB in your language, if there is one."
				sed -i "s/$translator_comment//" "$wmldir/$subdir/$lang/$wmlfile"
			fi

			# Fix download.wml
                        if [ $wmlfile = "download.wml" ]
			then
				sed -i 's/<!--PO4ASHARPBEGINinclude <lang.wmi>/#include <lang.wmi>/g' "$wmldir/$subdir/$lang/$wmlfile"
				sed -i 's/<!--PO4ASHARPBEGINinclude <foot.wmi>//g' "$wmldir/$subdir/$lang/$wmlfile"
				sed -i 's/<!--PO4ASHARPBEGIN//g;s/PO4ASHARPEND-->//g' "$wmldir/$subdir/$lang/$wmlfile"
				echo "#include <foot.wmi>" >> "$wmldir/$subdir/$lang/$wmlfile"
			fi

			# Include the English footer for most of the
			# translations
			if [[ $lang != "ar" && $lang != "pl" && $lang != "de" && $lang != "fa" ]]
			then
				echo '#include "foot.wmi"' >> "$wmldir/$subdir/$lang/$wmlfile"
			fi

			# If the file is overview.wml, make sure we
			# include the correct set of images
			if [ $wmlfile = "overview.wml" ] && [[ $lang = "de" || $lang = "es" || $lang = "fr" ||
				$lang = "ja" || $lang = "nl" || $lang = "no" || $lang = "pl" || $lang = "ru" ||
				$lang = "zh" ]]
			then
				sed -i "s/htw1.png/htw1_$lang.png/" "$wmldir/$subdir/$lang/$wmlfile"
				sed -i "s/htw2.png/htw2_$lang.png/" "$wmldir/$subdir/$lang/$wmlfile"
				sed -i "s/htw3.png/htw3_$lang.png/" "$wmldir/$subdir/$lang/$wmlfile"
			fi

                        # If the translation is Polish, include the
                        # correct header, menu files and footer
			if [ $lang = "pl" ]
			then
				orig_head=`grep '#include "head.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
				new_head=`echo $orig_head | sed s@head.wmi@pl/head.wmi@`
				sed -i "s@$orig_head@$new_head@" "$wmldir/$subdir/$lang/$wmlfile"

				# Side (not all files include this)
				orig_side=`grep '#include "side.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
				if [ -n "$orig_side" ]
				then
					new_side=`echo '#include "pl/side.wmi"'`
					sed -i "s@$orig_side@$new_side@" "$wmldir/$subdir/$lang/$wmlfile"
				fi

				# Info (not all files include this)
				orig_info=`grep '#include "info.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
				if [ -n "$orig_info" ]
				then
					new_info=`echo '#include "pl/info.wmi"'`
					sed -i "s@$orig_info@$new_info@" "$wmldir/$subdir/$lang/$wmlfile"
				fi

				# Footer
				echo '#include "pl/foot.wmi"' >> "$wmldir/$subdir/$lang/$wmlfile"
			fi

                        # If the translation is German, include the
                        # correct header, menu files and footer
                        if [ $lang = "de" ]
                        then
                                orig_head=`grep '#include "head.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
                                new_head=`echo $orig_head | sed s@head.wmi@de/head.wmi@`
                                sed -i "s@$orig_head@$new_head@" "$wmldir/$subdir/$lang/$wmlfile"

                                # Side (not all files include this)
                                orig_side=`grep '#include "side.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
                                if [ -n "$orig_side" ]
                                then
                                        new_side=`echo '#include "de/side.wmi"'`
                                        sed -i "s@$orig_side@$new_side@" "$wmldir/$subdir/$lang/$wmlfile"
                                fi

                                # Info (not all files include this)
                                orig_info=`grep '#include "info.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
                                if [ -n "$orig_info" ]
                                then
                                        new_info=`echo '#include "de/info.wmi"'`
                                        sed -i "s@$orig_info@$new_info@" "$wmldir/$subdir/$lang/$wmlfile"
                                fi

                                # Footer
                                echo '#include "de/foot.wmi"' >> "$wmldir/$subdir/$lang/$wmlfile"

				# If the file is tor-doc-windows, make
				# sure we include the German video
				if [ $wmlfile = "tor-doc-windows.wml" ]
				then
					orig_video=`grep src=\"https:\/\/media.torproject.org\/video\/2009-install-and-use-tor.ogv\" "$wmldir/$subdir/$lang/$wmlfile"`
					translated_video=`echo "<p>Das nachfolgende Video, wurde von SemperVideo erstellt.</p> <p><video id=\"v1\" src=\"https://media.torproject.org/video/2011-install-and-use-tor-de.ogv\" autobuffer=\"true\" controls=\"controls\"></video></p>"`
					new_video=`echo "$orig_video $translated_video"`

					sed -i "s@$orig_video@$new_video@" "$wmldir/$subdir/$lang/$wmlfile"
				fi
                        fi

			# If the file is an Arabic translation, include the
			# correct header, css, menu files and footer
			if [ $lang = "ar" ]
			then
				# Head
				orig_head=`grep '#include "head.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
				temp_head=`echo $orig_head | sed s@head.wmi@ar/head.wmi@`
				new_head=`echo $temp_head 'STYLESHEET="css/master-rtl.min.css"'`
				sed -i "s@$orig_head@$new_head@" "$wmldir/$subdir/$lang/$wmlfile"

				# Side (not all files include this)
				orig_side=`grep '#include "side.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
				if [ -n "$orig_side" ]
				then
					new_side=`echo '#include "ar/side.wmi"'`
					sed -i "s@$orig_side@$new_side@" "$wmldir/$subdir/$lang/$wmlfile"
				fi

				# Info (not all files include this)
				orig_info=`grep '#include "info.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
				if [ -n "$orig_info" ]
				then
					new_info=`echo '#include "ar/info.wmi"'`
					sed -i "s@$orig_info@$new_info@" "$wmldir/$subdir/$lang/$wmlfile"
				fi

				# Footer
				echo '#include "ar/foot.wmi"' >> "$wmldir/$subdir/$lang/$wmlfile"
			fi

                        # If the file is a Farsi translation, include the
                        # correct header, css, menu files and footer
                        if [ $lang = "fa" ]
                        then
                                # Head
                                orig_head=`grep '#include "head.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
                                temp_head=`echo $orig_head | sed s@head.wmi@fa/head.wmi@`
                                new_head=`echo $temp_head 'STYLESHEET="css/master-rtl.min.css"'`
                                sed -i "s@$orig_head@$new_head@" "$wmldir/$subdir/$lang/$wmlfile"

                                # Side (not all files include this)
                                orig_side=`grep '#include "side.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
                                if [ -n "$orig_side" ]
                                then
                                        new_side=`echo '#include "fa/side.wmi"'`
                                        sed -i "s@$orig_side@$new_side@" "$wmldir/$subdir/$lang/$wmlfile"
                                fi

                                # Info (not all files include this)
                                orig_info=`grep '#include "info.wmi"' "$wmldir/$subdir/$lang/$wmlfile"`
                                if [ -n "$orig_info" ]
                                then
                                        new_info=`echo '#include "fa/info.wmi"'`
                                        sed -i "s@$orig_info@$new_info@" "$wmldir/$subdir/$lang/$wmlfile"
                                fi

                                # Footer
                                echo '#include "fa/foot.wmi"' >> "$wmldir/$subdir/$lang/$wmlfile"
                        fi

			# If the directory does not include sidenav.wmi,
			# copy it from the English directory (only if
			# the English directory has this file)
			if [[ ! -e "$wmldir/$subdir/$lang/sidenav.wmi" && -e "$wmldir/$subdir/en/sidenav.wmi" ]]
			then
				cp "$wmldir/$subdir/en/sidenav.wmi" "$wmldir/$subdir/$lang/"
			fi
		fi
	}

	# If $onedirup is equal to $lang, that means we do not have a
	# subdirectory.
	if [ $onedirup == $lang ]
	then
		# If the current directory is "pl_PL" use "pl" instead
		if [ $subdir = "pl_PL" ]
		then
			subdir="pl"
			nosubdir
		fi

		# If the current directory is "nb" use "no" instead
		if [ $subdir = "nb" ]
		then
			subdir="no"
			nosubdir
		fi

		# If the current directory is "sv" use "se" instead
		if [ $subdir = "sv" ]
		then
			subdir="se"
			nosubdir
		fi

                # If the current subdirectory is of the form "xx_XX",
                # rename to "xx-xx" instead (except for pl_PL)
                if [[ $subdir =~ "_" && $subdir != "pl_PL" ]]
                then
                        subdir="`echo $subdir | sed s/_/-/ | tr '[A-Z]' '[a-z]'`"
                        nosubdir
                fi

		# Convert everything else
		if [[ $subdir != "en" && $subdir != "pl_PL" && ! ($subdir =~ "_") && $subdir != "nb" && $subdir != "sv" ]]
		then
			nosubdir
		fi
	else
		# If the current language is "pl_PL" use "pl" instead
		if [ $lang = "pl_PL" ]
		then
			lang="pl"
			subdir
		fi

		# If the current language is "nb" use "no" instead
		if [ $lang = "nb" ]
		then
			lang="no"
			subdir
		fi

		# If the current language is "sv" use "se" instead
		if [ $lang = "sv" ]
		then
			lang="se"
			subdir
		fi

                # If the current languge is of the form "xx_XX", rename
                # to "xx-xx" instead (except for pl_PL)
                if [[ $lang =~ "_" && $lang != "pl_PL" ]]
                then
                        lang="`echo $lang | sed s/_/-/ | tr '[A-Z]' '[a-z]'`"
                        subdir
                fi

		# Convert everything else
		if [[ $lang != "en" && $lang != "pl_PL" && ! ($lang =~ "_") && $lang != "nb" && $lang != "sv" ]]
		then
			subdir
		fi
	fi
done
