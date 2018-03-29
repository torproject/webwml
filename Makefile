# Directions for building the website:
#
# 1. Clone the Tor git repository and make TORGIT point to it:
#
# 	git clone https://git.torproject.org/tor/ tor.git
#
#    Note that you will need to point to the actual .git directory.
# 2. Edit include/versions.wmi or others if you like
# 3. Update STABLETAG and DEVTAG below if there is a new git tag
# 4. make
# 5. Do a git commit for your changes

# Then either 6a) git push to staging or master, or 6b) push your git
# branch to your personal webwml repository, open a trac ticket in the
# website component, and set it to needs_review.

export STABLETAG=tor-0.3.2.10
export DEVTAG=tor-0.3.3.4-alpha

WMLBASE=.
SUBDIRS=docs eff projects press about download getinvolved donate docs/torbutton
include $(WMLBASE)/Makefile.local
include $(WMLBASE)/Makefile.common

all: $(SUBDIRS)
docs:
	$(MAKE) -C "$@" WMLBASE=..
eff:
	$(MAKE) -C "$@" WMLBASE=..
projects:
	$(MAKE) -C "$@" WMLBASE=..
press:
	$(MAKE) -C "$@" WMLBASE=..
about:
	$(MAKE) -C "$@" WMLBASE=..
download:
	$(MAKE) -C "$@" WMLBASE=..
getinvolved:
	$(MAKE) -C "$@" WMLBASE=..
donate:
	$(MAKE) -C "$@" WMLBASE=..
docs/torbutton:
	$(MAKE) -C "$@" WMLBASE=../..
mirrors:
	./update-mirrors.pl
translations:
	./po2wml.sh
qrcode:
	qrencode -o $(IMGROOT)/android/orbot-qr-code-latest.png \
    "https://www.torproject.org/dist/android/alpha-orbot-latest.apk"

# XXX: this also depends on all subs' wmlfiles.  How to fix?
#translation-status.html.en: $(LANGS) $(WMIFILES) $(WMLFILES)

.PHONY: docs eff projects press about download getinvolved donate docs/torbutton
