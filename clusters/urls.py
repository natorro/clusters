"""clusters URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/1.9/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  url(r'^$', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  url(r'^$', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.conf.urls import url, include
    2. Add a URL to urlpatterns:  url(r'^blog/', include('blog.urls'))
"""
from django.conf.urls import url
from django.contrib import admin

urlpatterns = [
    url(r'^admin/', admin.site.urls),
    url(r'^$', 'apps.home.views.init', name='init'),
    url(r'^features/$', 'apps.home.views.features', name='features'),
    url(r'^software/$', 'apps.home.views.software', name='software'),
    url(r'^manuals/$', 'apps.home.views.manuals', name='manuals'),
    url(r'^research/$', 'apps.home.views.research', name='research'),
    url(r'^lists/$', 'apps.home.views.lists', name='lists'),
    url(r'^news/(?P<id>\d+)/$', 'apps.home.views.news', name='news'),
    url(r'^historic/$', 'apps.home.views.historic', name='historic'),
    url(r'^baktum_manual/$', 'apps.home.views.baktum_manual', name='baktum_manual'),
    url(r'^tutorial_queus/$', 'apps.home.views.tutorial_queus', name='tutorial_queus'),
    url(r'^mingus_manual/$', 'apps.home.views.mingus_manual', name='mingus_manual'),
    url(r'^mkl/$', 'apps.home.views.mkl', name='mkl'),
    url(r'^cernlib/$', 'apps.home.views.cernlib', name='cernlib'),
    url(r'^release_notes/$', 'apps.home.views.release_notes', name='release_notes'),
    url(r'^vml_notes/$', 'apps.home.views.vml_notes', name='vml_notes'),
    url(r'^fftw2xmkl_notes/$', 'apps.home.views.fftw2xmkl_notes', name='fftw2xmkl_notes'),
    url(r'^fftw23xmkl_notes/$', 'apps.home.views.fftw3xmkl_notes', name='fftw3xmkl_notes'),







]
