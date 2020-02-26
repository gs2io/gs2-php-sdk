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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\MoldModelMaster;

/**
 * フォームの保存領域マスターの一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeMoldModelMastersResult implements IResult {
	/** @var MoldModelMaster[] フォームの保存領域マスターのリスト */
	private $items;
	/** @var string リストの続きを取得するためのページトークン */
	private $nextPageToken;

	/**
	 * フォームの保存領域マスターのリストを取得
	 *
	 * @return MoldModelMaster[]|null フォームの保存領域マスターの一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * フォームの保存領域マスターのリストを設定
	 *
	 * @param MoldModelMaster[]|null $items フォームの保存領域マスターの一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * リストの続きを取得するためのページトークンを取得
	 *
	 * @return string|null フォームの保存領域マスターの一覧を取得
	 */
	public function getNextPageToken(): ?string {
		return $this->nextPageToken;
	}

	/**
	 * リストの続きを取得するためのページトークンを設定
	 *
	 * @param string|null $nextPageToken フォームの保存領域マスターの一覧を取得
	 */
	public function setNextPageToken(?string $nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

    public static function fromJson(array $data): DescribeMoldModelMastersResult {
        $result = new DescribeMoldModelMastersResult();
        $result->setItems(array_map(
                function ($v) {
                    return MoldModelMaster::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setNextPageToken(isset($data["nextPageToken"]) ? $data["nextPageToken"] : null);
        return $result;
    }
}