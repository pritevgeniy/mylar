<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TranslateRequest;
use App\Translate;

class TranslateController extends Controller
{
    /**
     * Запрос на получение списка языков
     * @return string[]
     */
    public function languagesList()
    {
        return Translate::$languagesAccepts;
    }

    /**
     * Запрос на получение текстов конкретного языка или всех языков
     * @return Translate[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index($lang = null)
    {
        if ($lang) {
            return Translate::where(['lang' => $lang])->get();
        } else {
            return Translate::all();
        }
    }

    public function show($lang, $texttype)
    {
        return Translate::where(['lang' => $lang, 'texttype' => $texttype])->firstOrFail();
    }

    public function store(TranslateRequest $request)
    {
        $lang = $request->input('lang');
        $texttype = $request->input('texttype');
        $model = Translate::where(['lang' => $lang, 'texttype' => $texttype])->first();
        if ($model) {
            throw new \Exception('Translation already exists', 400);
        }
        $this->createAlsoLanguages($lang, $texttype);

        return Translate::create($request->all());
    }

    public function update(TranslateRequest $request)
    {
        $lang = $request->input('lang');
        $texttype = $request->input('texttype');
        $model = Translate::where(['lang' => $lang, 'texttype' => $texttype])->firstOrFail();
        $model->update($request->all());

        return $model;
    }

    public function delete(TranslateRequest $request)
    {
        $lang = $request->input('lang');
        $texttype = $request->input('texttype');
        $model = Translate::where(['lang' => $lang, 'texttype' => $texttype])->firstOrFail();
        $model->delete();

        return 204;
    }

    /**
     * Создает пустые переводы для других языков
     */
    private function createAlsoLanguages($lang, $texttype)
    {
        foreach (Translate::$languagesAccepts as $iLanguage) {
            if ($iLanguage == $lang ||
                Translate::where(['lang' => $lang, 'texttype' => $texttype])->first()) continue;

            Translate::create(['lang' => $iLanguage, 'texttype' => $texttype, 'value' => '']);
        }
    }
}
