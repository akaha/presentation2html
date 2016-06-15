#!/bin/bash
if [[ ! -d /input || ! -d /output ]] ; then
	echo "directory /input or /output doesn't exist"
else
	FILES=/input/*.pdf
	for f in $FILES
	do
		if [[ -f $f ]] ; then # if file exists
			filename=$(basename "$f") # without path
			fname="${filename%.*}" # without extension
			if [[ -d /output/$fname ]] ; then # if directory exists
				rm -rf /output/$fname
			fi
			mkdir /output/$fname
			pdf2svg /input/$filename /output/$fname/$fname%d.svg all
			if [[ $? -ne 0 ]] ; then
				echo "pdf2svg failed with file $f"
				mv $f "${f}_failed"
				rm -rf /output/$fname
				#exit 1
			else
				rm $f
				echo "Converted $f"
			fi
		fi
	done
fi