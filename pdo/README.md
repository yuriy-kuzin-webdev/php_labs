## Build
```bash
docker build -t phpmyadmin-project .
```
## Run
```bash
docker run -d -p 8080:80 -p 3306:3306 phpmyadmin-project
```
### Remove docker 
```bash
docker system prune -a --volumes
```
