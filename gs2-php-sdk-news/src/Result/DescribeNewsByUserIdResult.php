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
use Gs2\News\Model\News;

/**
 * ユーザIDを指定してお知らせ記事の一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeNewsByUserIdResult implements IResult {
	/** @var News[] お知らせ記事のリスト */
	private $items;
	/** @var string お知らせ記事データのハッシュ値 */
	private $contentHash;
	/** @var string テンプレートデータのハッシュ値 */
	private $templateHash;

	/**
	 * お知らせ記事のリストを取得
	 *
	 * @return News[]|null ユーザIDを指定してお知らせ記事の一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * お知らせ記事のリストを設定
	 *
	 * @param News[]|null $items ユーザIDを指定してお知らせ記事の一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * お知らせ記事データのハッシュ値を取得
	 *
	 * @return string|null ユーザIDを指定してお知らせ記事の一覧を取得
	 */
	public function getContentHash(): ?string {
		return $this->contentHash;
	}

	/**
	 * お知らせ記事データのハッシュ値を設定
	 *
	 * @param string|null $contentHash ユーザIDを指定してお知らせ記事の一覧を取得
	 */
	public function setContentHash(?string $contentHash) {
		$this->contentHash = $contentHash;
	}

	/**
	 * テンプレートデータのハッシュ値を取得
	 *
	 * @return string|null ユーザIDを指定してお知らせ記事の一覧を取得
	 */
	public function getTemplateHash(): ?string {
		return $this->templateHash;
	}

	/**
	 * テンプレートデータのハッシュ値を設定
	 *
	 * @param string|null $templateHash ユーザIDを指定してお知らせ記事の一覧を取得
	 */
	public function setTemplateHash(?string $templateHash) {
		$this->templateHash = $templateHash;
	}

    public static function fromJson(array $data): DescribeNewsByUserIdResult {
        $result = new DescribeNewsByUserIdResult();
        $result->setItems(array_map(
                function ($v) {
                    return News::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setContentHash(isset($data["contentHash"]) ? $data["contentHash"] : null);
        $result->setTemplateHash(isset($data["templateHash"]) ? $data["templateHash"] : null);
        return $result;
    }
}