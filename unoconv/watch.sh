#!/bin/bash
if [[ ! -d /input ]] ; then
	echo "directory /input or /output doesn't exist"
else
	FILES=/input/*
	for f in $FILES
	do
		if [[ -f $f && ( "${f##*.}" == "ppt" || "${f##*.}" == "pptx" || "${f##*.}" == "odp"  ) ]] ; then # if file exists
			unoconv -f pdf $f
			if [[ $? -ne 0 ]] ; then
				echo "unoconv failed with file $f"
				mv $f "${f}_failed"
			else
				rm $f
				echo "Converted $f"
			fi
		else
			echo "No supported file"
		fi
	done
fi