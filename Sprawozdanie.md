![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image1.png)

Programowanie Full-Stack w Chmurze Obliczeniowej

Laboratorium 1 - Sprawozdanie

Prowadzący: dr inż. Sławomir Przyłucki

Sprawozdanie wykonał: Paweł Dąbek I2N 2.1

a. Polecenie zbudowania obrazu opracowanego kontenera:

_docker build -t moj_obraz ._

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image7.png)

b. Polecenie uruchomienia kontenera na podstawie zbudowanego obrazu:

_docker run -p 80:80 -d moj_obraz_

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image6.png)

c. Polecenia sposobu uzyskania informacji, które wygenerował serwer w > trakcie uruchomienia kontenera

_docker cp \<id_kontenera\>:/var/www/html/server_log.txt ._

w celu skopiowania pliku z logami

_docker ps_

w celu ustalenia id_kontenera

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image4.png)

d. Polecenie sprawdzenia, ile warstw posiada zbudowany obraz

_docker history moj_obraz_

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image10.png)

Część dodatkowa:

Komenda tworząca builder:

_docker buildx create \--use \--name mybuilder_

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image3.png)

Sprawdzenie jakie platformy są dostępne:

_docker buildx inspect \--bootstrap_

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image8.png)

Budowanie obrazów na architektury linux/arm/v7, linux/arm64/v8 oraz
linux/amd64 za pomocą docker container:\
\
_docker buildx build \--platform linux/amd64,linux/arm64/v8,linux/arm/v7
\--build-arg BUILDKIT_INLINE_CACHE=1
\--cache-from=type=registry,ref=pawelekdabek/pwcho-lab-1:latest \--push
-t pawelekdabek/pwcho-lab-1:latest
\'[[https://github.com/pawel-dabek/pwcho-lab-1.git#main]](https://github.com/pawel-dabek/pwcho-lab-1.git#main)\'_

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image9.png)

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image5.png)
\
\
Można zauważyć, że wystąpił problem z zaimportowaniem pliku manifest
cache. Spowodowane jest to tym, że był to pierwszy raz budowania obrazów
i cache nie był jeszcze dostępny. Przy następnych budowaniach natomiast
zostanie on poprawnie wykorzystany.

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image2.png)
