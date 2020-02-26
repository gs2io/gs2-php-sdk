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

namespace Gs2\Mission\Result;

use Gs2\Core\Model\IResult;
use Gs2\Mission\Model\CounterModelMaster;

/**
 * カウンターの種類マスターを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetCounterModelMasterResult implements IResult {
	/** @var CounterModelMaster カウンターの種類マスター */
	private $item;

	/**
	 * カウンターの種類マスターを取得
	 *
	 * @return CounterModelMaster|null カウンターの種類マスターを取得
	 */
	public function getItem(): ?CounterModelMaster {
		return $this->item;
	}

	/**
	 * カウンターの種類マスターを設定
	 *
	 * @param CounterModelMaster|null $item カウンターの種類マスターを取得
	 */
	public function setItem(?CounterModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetCounterModelMasterResult {
        $result = new GetCounterModelMasterResult();
        $result->setItem(isset($data["item"]) ? CounterModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}