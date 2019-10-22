import speech_recognition as sr

r = sr.Recognizer()
input = sr.AudioFile('/home/user/Documents/output.flac')
with input as source:
    audio = r.record(source)

r.recognize_sphinx(audio)