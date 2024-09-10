# Probably sybase pdo_odbc bug

## Installation

```shell
cd docker
docker compose up -d
```

## Create table, procedure and insert data 
wait for "SYBASE INITIALIZED" message in sybase_16.0 logs then execute:
```shell
docker exec -it sybase_16.0 sh -c "source /opt/sybase/SYBASE.sh;isql -U sa -P myPassword -S MYSYBASE -i /tmp/init.sql"
```

web url: http://localhost
