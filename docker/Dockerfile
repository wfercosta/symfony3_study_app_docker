FROM centos:6

######################################################################
# Realiza a Instalação dos pacotes
######################################################################
RUN yum -y update
RUN yum -y install epel-release
RUN yum -y install  wget \
                    lsof \
                    vim \
                    java-1.8.0-openjdk \
                    openssh-server \
                    mysql-server \
                    python-setuptools \
                    redis \
                && yum clean all

######################################################################
# Modifica a senha padrão do usuário root
######################################################################
RUN echo 'root:root' | chpasswd

######################################################################
# Configura a ferramenta de migração do banco de dados e realiza a
#   a sua execução.
######################################################################
RUN wget --quiet \
    -O - https://repo1.maven.org/maven2/org/flywaydb/flyway-commandline/4.0.3/flyway-commandline-4.0.3-linux-x64.tar.gz \
    | tar -zxf - -C /usr/local/share

ADD config/flyway/flyway.conf /usr/local/share/flyway-4.0.3/conf/
ADD migrations /usr/local/share/flyway-4.0.3/sql/
RUN ln -s /usr/local/share/flyway-4.0.3/flyway /usr/local/bin/flyway

######################################################################
# Configura o banco de dados mysql
######################################################################
ADD config/mysql/my.conf /etc/
ADD config/mysql/setup.sh /tmp/

RUN chown root:root /tmp/setup.sh \
    && chmod 775 /tmp/setup.sh \
    && /tmp/setup.sh

RUN sed -i -e 's/\r$//g' /tmp/setup.sh
RUN sed -i -e 's/^M//g' /tmp/setup.sh

######################################################################
# Configura o serviço de SSH
######################################################################
RUN sed -i 's/#PermitRootLogin yes/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN mkdir -p /var/run/sshd && chmod 0755 /var/run/sshd
RUN mkdir -p /root/.ssh/ && touch /root/.ssh/authorized_keys
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd

######################################################################
# Configura o serviço do REDIS
######################################################################
ADD config/redis/redis.conf /etc/

######################################################################
# Configura o servico do Supervisor
######################################################################
RUN easy_install supervisor && \
                 mkdir -p /etc/supervisor/conf.d && \
                 echo_supervisord_conf > /etc/supervisor/supervisord.conf

RUN echo -e '[program:sshd]\ncommand=/usr/sbin/sshd -D\n\n' >> /etc/supervisor/supervisord.conf
RUN echo -e '[program:mysqld]\ncommand=/etc/init.d/mysqld restart \n\n' >> /etc/supervisor/supervisord.conf
RUN echo -e '[program:redis]\ncommand=/usr/sbin/redis-server /etc/redis.conf\nautostart=true\nautorestart=true\nuser=root\nstdout_logfile=/var/log/redis/stdout.log\nstderr_logfile=/var/log/redis/stderr.log\n\n' >> /etc/supervisor/supervisord.conf

######################################################################
# Abre as portas pré-definidas e inicializa os serviços
######################################################################
EXPOSE 81 22 3306 6379
CMD exec supervisord -n
