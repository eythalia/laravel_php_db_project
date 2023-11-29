#!/bin/bash

# Check if at least one branch name is provided
if [ "$#" -eq 0 ]; then
  echo "Usage: $0 branch_name1 branch_name2 ..."
  exit 1
fi

# Iterate through each provided branch name
for branch in "$@"; do
  # Remove the specified branch from the remote repository
  git push origin --delete "$branch"

  # Check if the branch removal was successful
  if [ $? -eq 0 ]; then
    echo "Branch '$branch' has been removed from the remote repository."
  else
    echo "Failed to remove branch '$branch' from the remote repository."
  fi
done
