FROM ubuntu:16.04

workdir ./agent
#install gcc

#install library
COPY librcsc-4.1.0.tar.gz .
COPY rcssserver-15.5.0.tar.gz .
COPY agent2d-3.1.1.tar.gz .
RUN apt-get update \
 	&& apt-get update \
	&& apt-get install -y build-essential curl wget g++-4.9 \
        tar bison flex libboost-all-dev \
	&& tar xvf librcsc-4.1.0.tar.gz \
	&& tar xvf agent2d-3.1.1.tar.gz \
	&& tar xvf rcssserver-15.5.0.tar.gz \
	&& cd librcsc-4.1.0 \
	&& ./configure \ 
        && make \
	&& make install \
	&& cd .. \
	&& cd rcssserver-15.5.0 \
	&& ./configure \
	&& make \
	&& make install \
	&& cd .. \
	&& cd agent2d-3.1.1 \ 
	&& ./configure \
	&& make \
	&& make install \
	&& cd ..
	
	




 










