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
use Gs2\Datastore\Model\DataObject;

/**
 * ユーザIDを指定してデータオブジェクトを削除する のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteDataObjectByUserIdResult implements IResult {
	/** @var DataObject データオブジェクト */
	private $item;

	/**
	 * データオブジェクトを取得
	 *
	 * @return DataObject|null ユーザIDを指定してデータオブジェクトを削除する
	 */
	public function getItem(): ?DataObject {
		return $this->item;
	}

	/**
	 * データオブジェクトを設定
	 *
	 * @param DataObject|null $item ユーザIDを指定してデータオブジェクトを削除する
	 */
	public function setItem(?DataObject $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteDataObjectByUserIdResult {
        $result = new DeleteDataObjectByUserIdResult();
        $result->setItem(isset($data["item"]) ? DataObject::fromJson($data["item"]) : null);
        return $result;
    }
}