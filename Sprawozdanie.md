![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image1.png){width="4.34375in"
height="0.8125in"}

Programowanie Full-Stack w Chmurze Obliczeniowej

Laboratorium 1 - Sprawozdanie

Prowadzący: dr inż. Sławomir Przyłucki

Sprawozdanie wykonał: Paweł Dąbek I2N 2.1

a.  Polecenie zbudowania obrazu opracowanego kontenera:

*docker build -t moj_obraz .*

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image7.png){width="6.267716535433071in"
height="1.1666666666666667in"}

b.  Polecenie uruchomienia kontenera na podstawie zbudowanego obrazu:

*docker run -p 80:80 -d moj_obraz*

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image6.png){width="6.267716535433071in"
height="0.4583333333333333in"}

c.  Polecenia sposobu uzyskania informacji, które wygenerował serwer w
    > trakcie uruchomienia kontenera

*docker cp \<id_kontenera\>:/var/www/html/server_log.txt .*

w celu skopiowania pliku z logami

*docker ps*

w celu ustalenia id_kontenera

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image4.png){width="6.267716535433071in"
height="0.5694444444444444in"}

d.  Polecenie sprawdzenia, ile warstw posiada zbudowany obraz

*docker history moj_obraz*

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image10.png){width="6.267716535433071in"
height="4.388888888888889in"}

Część dodatkowa:

Komenda tworząca builder:

*docker buildx create \--use \--name mybuilder*

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image3.png){width="6.267716535433071in"
height="0.4166666666666667in"}

Sprawdzenie jakie platformy są dostępne:

*docker buildx inspect \--bootstrap*

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image8.png){width="6.267716535433071in"
height="1.2638888888888888in"}

Budowanie obrazów na architektury linux/arm/v7, linux/arm64/v8 oraz
linux/amd64 za pomocą docker container:\
\
*docker buildx build \--platform linux/amd64,linux/arm64/v8,linux/arm/v7
\--build-arg BUILDKIT_INLINE_CACHE=1
\--cache-from=type=registry,ref=pawelekdabek/pwcho-lab-1:latest \--push
-t pawelekdabek/pwcho-lab-1:latest
\'[[https://github.com/pawel-dabek/pwcho-lab-1.git#main]{.underline}](https://github.com/pawel-dabek/pwcho-lab-1.git#main)\'*

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image9.png){width="6.267716535433071in"
height="2.763888888888889in"}

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image5.png){width="6.267716535433071in"
height="4.055555555555555in"}\
\
Można zauważyć, że wystąpił problem z zaimportowaniem pliku manifest
cache. Spowodowane jest to tym, że był to pierwszy raz budowania obrazów
i cache nie był jeszcze dostępny. Przy następnych budowaniach natomiast
zostanie on poprawnie wykorzystany.

Efekt:

![](vertopal_8320911a5c6f41359ce3d43ff297f8bd/media/image2.png){width="6.267716535433071in"
height="2.625in"}
