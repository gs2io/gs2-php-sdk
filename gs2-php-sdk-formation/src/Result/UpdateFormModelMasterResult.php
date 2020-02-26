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
use Gs2\Formation\Model\FormModelMaster;

/**
 * フォームマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateFormModelMasterResult implements IResult {
	/** @var FormModelMaster 更新したフォームマスター */
	private $item;

	/**
	 * 更新したフォームマスターを取得
	 *
	 * @return FormModelMaster|null フォームマスターを更新
	 */
	public function getItem(): ?FormModelMaster {
		return $this->item;
	}

	/**
	 * 更新したフォームマスターを設定
	 *
	 * @param FormModelMaster|null $item フォームマスターを更新
	 */
	public function setItem(?FormModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateFormModelMasterResult {
        $result = new UpdateFormModelMasterResult();
        $result->setItem(isset($data["item"]) ? FormModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}