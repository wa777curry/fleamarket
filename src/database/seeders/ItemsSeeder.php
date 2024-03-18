<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 2,
            'itemname' => 'ショートブーツ',
            'description' => '洗練されたデザインで、シンプルながらも大人の魅力を引き立てます。快適な履き心地と高い耐久性が特徴で、様々なスタイルにマッチします。',
            'price' => 15000,
            'item_url' => url('/img/item/boots-black.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 3,
            'itemname' => 'ショートブーツ',
            'description' => 'シンプルで上品なデザインが特徴です。柔らかい質感と暖かみのある色合いが、秋冬のコーディネートにぴったり。足首をすっきりと包み込むシルエットで、歩きやすさも抜群です。',
            'price' => 10000,
            'item_url' => url('/img/item/boots-brown.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 1,
            'subcategory_id' => 1,
            'condition_id' => 1,
            'itemname' => 'ショートブーツ',
            'description' => 'クラシカルな雰囲気と高級感が魅力です。上質なレザー素材が足元に上品さをプラスし、シンプルなデザインで幅広いスタイルに合わせやすいです。また、しっかりとした作りで耐久性も抜群。ファッションのアクセントとして重宝するアイテムです。',
            'price' => 20000,
            'item_url' => url('/img/item/boots-brown2.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 1,
            'subcategory_id' => 1,
            'condition_id' => 4,
            'itemname' => 'ミドルブーツ',
            'description' => '個性的でオリジナルなスタイルを演出します。やや汚れがありますが、それがブーツの風格を引き立てます。汚れた部分が独自のストーリーを物語り、カジュアルな装いに独創性を加えます。',
            'price' => 10000,
            'item_url' => url('/img/item/boots-gray.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 1,
            'subcategory_id' => 1,
            'condition_id' => 1,
            'itemname' => 'ローファーシューズ',
            'description' => '上品さと洗練された雰囲気を漂わせます。クラシックなデザインでありながら、スタイリッシュでモダンな印象を与えます。快適な履き心地と高品質な素材が、長時間の着用にも耐えます。ビジネスシーンからカジュアルなイベントまで幅広く活躍します。',
            'price' => 35000,
            'item_url' => url('/img/item/leather-brown.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 1,
            'subcategory_id' => 1,
            'condition_id' => 1,
            'itemname' => 'ローファーシューズ',
            'description' => '洗練されたデザインと上質な素材で作られています。落ち着いた色合いとクラシックなスタイルは、さまざまなシーンで活躍します。快適な履き心地と耐久性に優れ、ビジネスシーンからカジュアルな場面まで幅広くコーディネートに取り入れられます。',
            'price' => 30000,
            'item_url' => url('/img/item/leather-brown2.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 1,
            'subcategory_id' => 1,
            'condition_id' => 3,
            'itemname' => 'ローファーシューズ',
            'description' => '洗練されたデザインと快適な履き心地が特徴です。ビジネスシーンでのプロフェッショナルな印象を与える一方で、カジュアルなスタイルにも合わせやすく、多彩なシーンで活躍します。様々なスタイルにマッチし、長く愛用できる一足です。',
            'price' => 17000,
            'item_url' => url('/img/item/leather-brown3.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 3,
            'itemname' => 'サンダル',
            'description' => 'バックストラップ付きで足を固定し、安定感を提供します。シンプルなデザインで様々なシーンで活躍します。快適な履き心地と適度な高さのヒールで、長時間の着用も疲れにくいです。ファッションアイテムとしても、日常使いとしても活躍する一足です。',
            'price' => 12000,
            'item_url' => url('/img/item/pumps-black.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 1,
            'itemname' => 'ハイヒール',
            'description' => '華やかなスタイルを演出します。高いヒールは足元を美しく引き立て、女性らしい魅力を際立たせます。特別な日やパーティーでの着用に最適で、洗練されたエレガンスを表現します。品質の高い素材と丁寧な仕上げは上質な印象を与え、足元から自信を演出します。',
            'price' => 20000,
            'item_url' => url('/img/item/pumps-black2.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 4,
            'itemname' => 'ハイヒール',
            'description' => '高めのヒールが女性らしい足元を演出します。装飾を抑えたシンプルなデザインは、エレガントさを引き立てます。高さがありながらも歩きやすさを考慮した設計で、特別な場面やパーティーにぴったりです。',
            'price' => 8000,
            'item_url' => url('/img/item/pumps-ivory.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 3,
            'itemname' => 'ハイヒール',
            'description' => '若々しさと華やかさを演出します。清涼感あふれる明るい色合いで、春や夏の季節にぴったりです。鮮やかな色味が注目を集めます。ファッションのアクセントとして活躍し、カジュアルからちょっとしたパーティーまで幅広くコーディネートできます。',
            'price' => 11000,
            'item_url' => url('/img/item/pumps-mint.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 3,
            'itemname' => 'パンプス',
            'description' => '柔らかなスエード素材が足元に優しさを添え、赤色が華やかさを引き立てます。パンプスのシルエットはシンプルでありながらも、歩くたびに美しい足元を演出します。様々なシーンで活躍し、おしゃれなコーディネートのアクセントとして活躍します。',
            'price' => 9000,
            'item_url' => url('/img/item/pumps-red.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 3,
            'itemname' => 'ハイヒール',
            'description' => '華やかな雰囲気を醸し出す一足です。その高いヒールは、スタイルをより美しく見せる効果がありますが、長時間の着用には注意が必要です。特別な場面で、自信とエレガンスを纏いましょう。',
            'price' => 10000,
            'item_url' => url('/img/item/pumps-red2.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 4,
            'itemname' => 'ハイヒール',
            'description' => '清楚で上品な印象を与える一足です。レースの装飾が優雅さを引き立て、足元に華やかさを添えます。ヒールの高さが女性らしい魅力を際立たせますが、長時間の着用には注意が必要です。ウェディングやパーティーなど、特別な場面で存在感を放ちましょう。',
            'price' => 7000,
            'item_url' => url('/img/item/pumps-white.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 2,
            'itemname' => 'ハイヒール',
            'description' => '明るく元気な印象を与えるアイテムです。ヒールが高めなので、スタイルアップ効果も期待できます。つま先部分のリボンが可愛らしさを演出し、足元に遊び心を加えます。おしゃれなコーディネートのポイントとして活躍しましょう。',
            'price' => 15000,
            'item_url' => url('/img/item/pumps-yellow.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 1,
            'subcategory_id' => 1,
            'condition_id' => 4,
            'itemname' => 'サンダル',
            'description' => '快適さとカジュアルさを兼ね備えたアイテムです。足元に軽やかさを与えながら、歩きやすさを提供します。様々なシーンで活躍し、夏の装いにぴったりです。気軽に履けるデザインなので、リラックスしたスタイルを楽しみたい方におすすめです。',
            'price' => 8000,
            'item_url' => url('/img/item/sandals-brown.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 2,
            'itemname' => 'サンダル',
            'description' => 'エレガントなデザインとヒールの高さが特徴です。ビーズ装飾が施されており、足元に華やかさを添えます。ヒールの高さは足元を美しく見せ、スタイルを引き立てます。パーティーや特別なイベントなど、フォーマルなシーンで活躍する一足です。女性らしさと上品さを演出したい方におすすめです。',
            'price' => 15000,
            'item_url' => url('/img/item/sandals-white.jpg'),
        ]);

        DB::table('items')->insert([
            'seller_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 1,
            'condition_id' => 3,
            'itemname' => 'サンダル',
            'description' => '全体に美しい装飾が施されています。豊かなデザインが足元を華やかに彩り、特別な日の装いに華を添えます。ビーズの輝きが光を反射し、足元を輝かせます。洗練されたデザインは、パーティーやイベントなど特別な場面での着用にぴったりです。女性らしさとエレガンスを演出したい方におすすめです。',
            'price' => 10000,
            'item_url' => url('/img/item/sandals-white2.jpg'),
        ]);
    }
}
