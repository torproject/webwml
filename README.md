# How to contribute

Thanks for being interested to work on the website, I tried to make a simple
how-to for you to quickly get you setup:

__Step 1:__ Clone the git repo.

    git clone https://git.torproject.org/project/web/webwml.git
    cd webwml

__Step 1b:__ Create a bare public repository (i.e on Github), where you'd push
your commits to. Make sure you're in `webwml` directory, and run:

    git remote add pick-a-name your-git-url

_Example:_
    `git remote add tpo-gh git@github.com:mrphs/tpo.git`

__Step 2:__ Create and switch to a new branch.

_In the following example, I've named my branch "docs" as I'm planning to work
on the documentations._

    git checkout -b docs

__Step 3:__ Now you can start working on website and make changes. Once you're
done, commit and push it to your public repo.

_Example:_

    git push tpo-gh docs

__Step 4:__ Open a new ticket on [trac](https://trac.torproject.org) with a
link to your shiny new repo/branch.

# Building website
Torproject website is being built and published automatically.
To quickly get set up and build website locally, simply follow these steps:

 __Step 1:__ Get the website's build dependencies.

    sudo apt-get install wml asciidoc

  __Step 2:__ Configure where to find your tor git repository. It needs this
to make the
     manual page.

    git clone https://git.torproject.org/project/web/webwml.git
    cd webwml
    cp Makefile.local.sample Makefile.local

Note: Change the `TORGIT` in Makefile.local to point to your tor git repo.

  __Step 3:__ Make the website.

    make

You should now be able to point your browser at the locally generated site...

    file:///home/atagar/Desktop/tor/webwml/getinvolved/volunteer.html.en


### Troubleshooting the build

The build fails with "Invalid object name".

  If you get an error like...

    ---- Contents of STDERR channel: ---------
    fatal: Invalid object name 'tor-0.2.6.1-alpha'.
    asciidoc: FAILED: manpage document title is mandatory
    No manpage because of asciidoc error or file not available from git at
    /tmp/wml.zwcq0q/wml.30867.tmp1.wml line 415.

  This means your tor repository is out of date. Update your tor git
repository.

### Some information regarding working with minified CSS and JS sources

If you want to edit any of the CSS or JS sources, please bear in mind that the HTML uses the minified versions. We keep in the repository both versions side-to-side. Once you edit the original source make sure you generate the minified version again. Most editors have plugins to minify CSS and JS files.

If you are wondering why is it "cool" to minify sources even though compression is used on the server, please consider that Minification can be well be used in combination with gzipping sources. Minification does a lot of additional things that compression doesn't do. During minification comments are removed, long variables are renamed to shorter variable names, etc. Transferred data can be significantly smaller after minification, than by simply compressing the original. Although this depends a lot on the original source, minifying helps with mobile browsers and slower connections.

### More detailed instructions from Roger

_Note: This section was written when website repo was still on svn, and it
wasn't built automatically._

Here are the instructions I sent David Fifield when he asked about
editing the website. I hope they are useful for you too! --Roger

Copy Makefile.local.sample to Makefile.local in your webwml/ directory.
Point TORGIT to a tor git.

Then apt-get install wml and (alas) probably a shocking number of other
debs. Then you can type 'make' and it will build the website for you
locally. It's probably a smart move to see whether 'make' works before
you git commit any changes to the wml files.

You can edit docs/en/pluggable-transports.wml (and that is
the right source file to edit, not the html). But go take a
look at that file. You'll notice it has a bunch of tags like
<version-torbrowserbundle>. If you're just bumping version
numbers, you probably just want to change the definition of those tags.
They're in include/versions.wmi

(Every once in a while you may need to edit pluggable-transports.wml
too -- generally when you change the file name so drastically that just
changing the versions.wmi tags isn't enough.)

Pushes to the master branch of the git repository will cause the
website to get re-built and published. Pushing to the staging branch
will update www-staging.torproject.org.

Alas, https://www.torproject.org/dist/ isn't in version control. You
write to it by ssh'ing to dist-master.torproject.org and going to
/srv/dist-master.torproject.org/htdocs/ and then sticking your stuff
there. When you want it to go live, you run
"static-update-component dist.torproject.org" on dist-master.

Weasel has hopes that somebody will write some scripts to make maintaining
packages in dist/ less awful -- automatically check that they have
signatures and that the sigs match, that the items on the website are in
fact in dist, only allow certain people to put files in certain places,
etc. One day! :)
# tp_donation
