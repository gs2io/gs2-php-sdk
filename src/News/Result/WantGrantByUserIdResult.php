<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\News\Result;

use Gs2\Core\Model\IResult;
use Gs2\News\Model\SetCookieRequestEntry;

/**
 * お知らせ記事に加算 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class WantGrantByUserIdResult implements IResult {
	/** @var SetCookieRequestEntry[] お知らせコンテンツにアクセスするために設定の必要なクッキー のリスト */
	private $items;
	/** @var string お知らせコンテンツにアクセスするためのURL */
	private $browserUrl;
	/** @var string ZIP形式のお知らせコンテンツにアクセスするためのURL Cookieの設定は不要 */
	private $zipUrl;

	/**
	 * お知らせコンテンツにアクセスするために設定の必要なクッキー のリストを取得
	 *
	 * @return SetCookieRequestEntry[]|null お知らせ記事に加算
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * お知らせコンテンツにアクセスするために設定の必要なクッキー のリストを設定
	 *
	 * @param SetCookieRequestEntry[]|null $items お知らせ記事に加算
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * お知らせコンテンツにアクセスするためのURLを取得
	 *
	 * @return string|null お知らせ記事に加算
	 */
	public function getBrowserUrl(): ?string {
		return $this->browserUrl;
	}

	/**
	 * お知らせコンテンツにアクセスするためのURLを設定
	 *
	 * @param string|null $browserUrl お知らせ記事に加算
	 */
	public function setBrowserUrl(?string $browserUrl) {
		$this->browserUrl = $browserUrl;
	}

	/**
	 * ZIP形式のお知らせコンテンツにアクセスするためのURL Cookieの設定は不要を取得
	 *
	 * @return string|null お知らせ記事に加算
	 */
	public function getZipUrl(): ?string {
		return $this->zipUrl;
	}

	/**
	 * ZIP形式のお知らせコンテンツにアクセスするためのURL Cookieの設定は不要を設定
	 *
	 * @param string|null $zipUrl お知らせ記事に加算
	 */
	public function setZipUrl(?string $zipUrl) {
		$this->zipUrl = $zipUrl;
	}

    public static function fromJson(array $data): WantGrantByUserIdResult {
        $result = new WantGrantByUserIdResult();
        $result->setItems(array_map(
                function ($v) {
                    return SetCookieRequestEntry::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setBrowserUrl(isset($data["browserUrl"]) ? $data["browserUrl"] : null);
        $result->setZipUrl(isset($data["zipUrl"]) ? $data["zipUrl"] : null);
        return $result;
    }
}