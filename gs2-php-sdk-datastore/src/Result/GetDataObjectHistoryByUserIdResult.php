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

namespace Gs2\Datastore\Result;

use Gs2\Core\Model\IResult;
use Gs2\Datastore\Model\DataObjectHistory;

/**
 * ユーザIDを指定してデータオブジェクト履歴を取得する のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetDataObjectHistoryByUserIdResult implements IResult {
	/** @var DataObjectHistory データオブジェクト履歴 */
	private $item;

	/**
	 * データオブジェクト履歴を取得
	 *
	 * @return DataObjectHistory|null ユーザIDを指定してデータオブジェクト履歴を取得する
	 */
	public function getItem(): ?DataObjectHistory {
		return $this->item;
	}

	/**
	 * データオブジェクト履歴を設定
	 *
	 * @param DataObjectHistory|null $item ユーザIDを指定してデータオブジェクト履歴を取得する
	 */
	public function setItem(?DataObjectHistory $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetDataObjectHistoryByUserIdResult {
        $result = new GetDataObjectHistoryByUserIdResult();
        $result->setItem(isset($data["item"]) ? DataObjectHistory::fromJson($data["item"]) : null);
        return $result;
    }
}