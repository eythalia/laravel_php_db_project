#!/bin/bash

# Fetch the latest information from the remote repository and prune references to remote branches
#diagrafoume refernces metaksy twn branches pou den yfistantai
#dld stale reference
git fetch --prune

# Get the list of local branches that no longer exist on the remote
# opoio branch exei fygei apo to remote tha exei sti grammi tou ": gone" kai kratame tin prwti stili dld to onoma tou branch
branches_to_remove=$(git branch -vv | grep ': gone]' | awk '{print $1}')

# Remove each local branch that is not present on the remote
for branch in $branches_to_remove; do
    git branch -d $branch
    if [ $? -eq 0 ]; then
        echo "Local branch '$branch' has been removed."
    else
        echo "Failed to remove local branch '$branch'. You may have unmerged changes."
    fi
done
