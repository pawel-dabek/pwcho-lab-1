










![](Aspose.Words.45ff9d1f-00a3-49f5-b237-768462489802.001.png)


Programowanie Full-Stack w Chmurze Obliczeniowej



Laboratorium 1 - Sprawozdanie


















Prowadzący: dr inż. Sławomir Przyłucki

Sprawozdanie wykonał: Paweł Dąbek I2N 2.1

1. Polecenie zbudowania obrazu opracowanego kontenera:


*docker build -t moj\_obraz .*

Efekt:

![](Aspose.Words.45ff9d1f-00a3-49f5-b237-768462489802.002.png)

1. Polecenie uruchomienia kontenera na podstawie zbudowanego obrazu:

*docker run -p 80:80 -d moj\_obraz*

Efekt:

![](Aspose.Words.45ff9d1f-00a3-49f5-b237-768462489802.003.png)

1. Polecenia sposobu uzyskania informacji, które wygenerował serwer w trakcie uruchomienia kontenera

*docker cp <id\_kontenera>:/var/www/html/server\_log.txt .*

w celu skopiowania pliku z logami

*docker ps* 

w celu ustalenia id\_kontenera

Efekt:

![](Aspose.Words.45ff9d1f-00a3-49f5-b237-768462489802.004.png)



1. Polecenie sprawdzenia, ile warstw posiada zbudowany obraz

*docker history moj\_obraz*

Efekt:

![](Aspose.Words.45ff9d1f-00a3-49f5-b237-768462489802.005.png)



Część dodatkowa:

Komenda tworząca builder:

*docker buildx create --use --name mybuilder*

Efekt:

![](Aspose.Words.45ff9d1f-00a3-49f5-b237-768462489802.006.png)



Sprawdzenie jakie platformy są dostępne:

*docker buildx inspect --bootstrap*

Efekt:

![](Aspose.Words.45ff9d1f-00a3-49f5-b237-768462489802.007.png)

Budowanie obrazów na architektury linux/arm/v7, linux/arm64/v8 oraz linux/amd64 za pomocą docker container:

*docker buildx build --platform linux/amd64,linux/arm64/v8,linux/arm/v7 --build-arg BUILDKIT\_INLINE\_CACHE=1 --cache-from=type=registry,ref=pawelekdabek/pwcho-lab-1:latest --push -t pawelekdabek/pwcho-lab-1:latest '<https://github.com/pawel-dabek/pwcho-lab-1.git#main>'*

Efekt:

![](Aspose.Words.45ff9d1f-00a3-49f5-b237-768462489802.008.png)

![](Aspose.Words.45ff9d1f-00a3-49f5-b237-768462489802.009.png)

Można zauważyć, że wystąpił problem z zaimportowaniem pliku manifest cache. Spowodowane jest to tym, że był to pierwszy raz budowania obrazów i cache nie był jeszcze dostępny. Przy następnych budowaniach natomiast zostanie on poprawnie wykorzystany.

Efekt:

![](Aspose.Words.45ff9d1f-00a3-49f5-b237-768462489802.010.png)


