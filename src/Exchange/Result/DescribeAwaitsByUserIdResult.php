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

namespace Gs2\Exchange\Result;

use Gs2\Core\Model\IResult;
use Gs2\Exchange\Model\Await;

/**
 * 交換待機の一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeAwaitsByUserIdResult implements IResult {
	/** @var Await[] 交換待機のリスト */
	private $items;
	/** @var string 次のページを取得するためのトークン */
	private $nextPageToken;

	/**
	 * 交換待機のリストを取得
	 *
	 * @return Await[]|null 交換待機の一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 交換待機のリストを設定
	 *
	 * @param Await[]|null $items 交換待機の一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * 次のページを取得するためのトークンを取得
	 *
	 * @return string|null 交換待機の一覧を取得
	 */
	public function getNextPageToken(): ?string {
		return $this->nextPageToken;
	}

	/**
	 * 次のページを取得するためのトークンを設定
	 *
	 * @param string|null $nextPageToken 交換待機の一覧を取得
	 */
	public function setNextPageToken(?string $nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

    public static function fromJson(array $data): DescribeAwaitsByUserIdResult {
        $result = new DescribeAwaitsByUserIdResult();
        $result->setItems(array_map(
                function ($v) {
                    return Await::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setNextPageToken(isset($data["nextPageToken"]) ? $data["nextPageToken"] : null);
        return $result;
    }
}