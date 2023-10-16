#!/bin/bash

# Ensure commit hash argument is passed
if [ -z "$1" ]; then
    echo "Error: Commit hash missing."
    exit 1
fi

# Fetch changes from upstream
git fetch upstream

# Create and checkout new branch based on upstream/main
git checkout -b "cherry-$1" upstream/main

# Cherry-pick the commit
git cherry-pick $1

# Push to upstream main
git push upstream main

#Back to origin/main
git checkout main

# Delete the temporary branch
git branch -D "cherry-$1"
