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
 * フォームの保存領域マスターを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteMoldModelMasterResult implements IResult {
	/** @var MoldModelMaster 削除したフォームの保存領域マスター */
	private $item;

	/**
	 * 削除したフォームの保存領域マスターを取得
	 *
	 * @return MoldModelMaster|null フォームの保存領域マスターを削除
	 */
	public function getItem(): ?MoldModelMaster {
		return $this->item;
	}

	/**
	 * 削除したフォームの保存領域マスターを設定
	 *
	 * @param MoldModelMaster|null $item フォームの保存領域マスターを削除
	 */
	public function setItem(?MoldModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteMoldModelMasterResult {
        $result = new DeleteMoldModelMasterResult();
        $result->setItem(isset($data["item"]) ? MoldModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}