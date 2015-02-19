# sincerelyyours
Initial push to github with working files and backup files. The directory 'trial' was the first attempt of the website
and still has good information in it that I will refer back to from time to time. 

Public is where the Class files are being held as well as the CSS and header and footer files.

All the other files are currently in the root directory. Although we will be be keeping track of images in the database,
we will not be tracking them in the repository.


## Running with docker ##

You can get a [docker](https://www.docker.com/) version of this running by
installing docker then install [fig](http://www.fig.sh/) like this:

    pip install fig

Start afresh and make a new database:

    fig stop; fig rm --force

Start/restart the web app and database:

    fig up

Populate the database with empty schema (I can't figure out a better way to do
this yet):

    curl http://127.0.0.1:9000/admin_loadschema.php

Stop everything:

    fig stop

Destroy everything:
    
    fig rm
