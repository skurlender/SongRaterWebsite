from django.shortcuts import render
from django.http import HttpResponse
from .forms import Userdb
from .models import Users, Ratings, Artists, Info

def index(request):
    context = {}
    if request.method == 'POST':
        uform = Userdb(request.POST)
        if uform.is_valid():
            uform.save()
            context['uform'] = uform
            return render(request, 'music/index.html', context)
        else:
            context['uform'] = uform
            return render(request, 'music/index.html', context)
    else:
        lst = []
        user = request.GET.get('user')

        if user == None:
            uform = Userdb()
            context['uform'] = uform
            return render(request, 'music/index.html', context)

        # print('USER: ' + str(user))
        # all ratings
        ratings_lst = Ratings.objects.all()
        # list of all info
        # print(ratings_lst)
        info_lst = Info.objects.all()
        # print('ok')
        for i in ratings_lst:
            # print('I.USERNAME = ' + str(i.username))
            if user == i.username:
                # print(' ')
                # print(i)
                # print(i.username)
                # print(i.song)
                # print(i.rating)
                # print(' ')
                for j in info_lst:
                    # print('J.SONG = ' + str(j.song))
                    if j.song == i.song:
                        lst.append(str(user) + ' gave song: "' + 
                                   str(i.song) + '" a rating of = ' + str(i.id) + '.')
                        lst.append('"' + str(i.song) + '" is of genre: ' + str(j.genre) + '.')
                        lst.append('"' + str(i.song) + '" was released in year: ' +
                                   str(j.year) + ' from album: ' + str(j.album) + '.')
                lst.append('--')
        if lst == []:
            context['printme'] = 'lawl'
            uform = Userdb()
            context['uform'] = uform
            return render(request, 'music/index.html', context)

        context['printme'] = lst
        uform = Userdb()
        context['uform'] = uform
        return render(request, 'music/index.html', context)