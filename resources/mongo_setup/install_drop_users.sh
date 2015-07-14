#!/bin/bash

# Student Portal Mongo Install
# Dustin Lyons
# 4/20/12

for DIR in *; do
    if [ -d "$DIR" ]; then 
        echo Importing schools collection to $DIR...
        mongoimport --drop -d $DIR -c schools schools.json
        echo Importing pages collection to $DIR...
        mongoimport --drop -d $DIR -c pages $DIR/pages.json
        echo Importing users collection to $DIR...
        mongoimport --drop -d $DIR -c users $DIR/users.json
    fi
done

# End script

