#!/bin/bash

# Check if at least one branch name is provided
if [ "$#" -eq 0 ]; then
  echo "Usage: $0 branch_name1 branch_name2 ..."
  exit 1
fi

# Fetch the latest information from the remote repository
git fetch --prune

# Get the list of branches to preserve (those provided as arguments)
branches_to_preserve="$@"

# Branches to exclude from deletion
#exclude_branches=("master" "main")

# Get the list of all local branches
all_branches=$(git branch | cut -c 3-)

# Iterate through each local branch
for branch in $all_branches; do
  # Check if the branch is in the list of branches to preserve or should be excluded
  if [[ ! " $branches_to_preserve " =~ " $branch " && ! " ${exclude_branches[@]} " =~ " $branch " ]]; then
    # Remove the specified branch from the remote repository
    git push origin --delete "$branch"

    # Check if the branch removal was successful
    if [ $? -eq 0 ]; then
      echo "Branch '$branch' has been removed from the remote repository."
    else
      echo "Failed to remove branch '$branch' from the remote repository."
    fi
  fi
done
