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

namespace Gs2\Dictionary\Result;

use Gs2\Core\Model\IResult;
use Gs2\Dictionary\Model\EntryModelMaster;

/**
 * エントリーモデルマスターを新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateEntryModelMasterResult implements IResult {
	/** @var EntryModelMaster 作成したエントリーモデルマスター */
	private $item;

	/**
	 * 作成したエントリーモデルマスターを取得
	 *
	 * @return EntryModelMaster|null エントリーモデルマスターを新規作成
	 */
	public function getItem(): ?EntryModelMaster {
		return $this->item;
	}

	/**
	 * 作成したエントリーモデルマスターを設定
	 *
	 * @param EntryModelMaster|null $item エントリーモデルマスターを新規作成
	 */
	public function setItem(?EntryModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateEntryModelMasterResult {
        $result = new CreateEntryModelMasterResult();
        $result->setItem(isset($data["item"]) ? EntryModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}