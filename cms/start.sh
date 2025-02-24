#!/bin/bash
set -e

echo "Checking for .git directory..."
if [ -d ".git" ]; then
  echo "Initializing submodules..."
  git submodule update --init --recursive
else
  echo ".git directory not found. Skipping submodule update."
fi

# Start Apache in the foreground
echo "Starting Apache..."
exec apache2-foreground
