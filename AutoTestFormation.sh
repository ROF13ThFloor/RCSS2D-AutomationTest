#!/bin/bash
DIR=`dirname $0`
FORMATIONS_PATH="${DIR}/OurFormations"
OPP_PATH="${DIR}/TheirCodes"
AUTOTEST="${DIR}/AutoTest"
OURCODE="${DIR}/OurCode"
ROUND=1
PROCESS=1

result(){
	if [ -d "Results" ]; then
		cat Results/*> old_`date +%s%N | cut -b1-13`.txt
		rm -r Results/*
	else
		mkdir Results
	fi
}

clearLast(){
	LAST=`pwd`
	cd $AUTOTEST
	./kill.sh
	./clear.sh
	cd $LAST
}

main() {

	echo "-------!TestStarted!---------"
	
	cd $FORMATIONS_PATH
	FORMS=()
	echo "Formations : "
	formation_count=0

	for i in $( for i in $(ls -d */); do echo ${i%%/}; done ); do	
		if [ $i != "." ] && [ $i != ".." ] ; then
			((formation_count+=1))
			echo  "	" $formation_count ${i}
			FORMS+="$i "
		fi
	done 	

	cd ../$OPP_PATH
	TESTTEAMS=()
	echo "Test Teams : "
	team_count=0

	for i in $( for i in $(ls -d */); do echo ${i%%/}; done ); do	
		if [ $i != "." ] && [ $i != ".." ] ; then
			((team_count+=1))
			echo  "	" $team_count ${i}
			TESTTEAMS+="$i "
		fi
	done 

	cd ../$AUTOTEST
	echo "--Start Test--"
	i=0
	j=0
	for team in $TESTTEAMS;do
		((i+=1))
		for form in $FORMS;do 
			((j+=1))
			echo " -----> $form"
			rm ../$OURCODE/Formations/*
			cp ../$FORMATIONS_PATH/$form/* ../$OURCODE/Formations/
			echo " T${i} of ${team_count} | F${j} of ${formation_count}"
			echo " -----------------"
			echo " Form Path - > ${form}"
			./test.sh -r $ROUND -p $PROCESS -f "${form}" -q "../TheirCodes/${team}" -w "${team}" -h 2
			sleep 1
		done
	done
	

}

result
clearLast
main
