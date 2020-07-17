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
 * フォームマスターを新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateFormModelMasterResult implements IResult {
	/** @var FormModelMaster 作成したフォームマスター */
	private $item;

	/**
	 * 作成したフォームマスターを取得
	 *
	 * @return FormModelMaster|null フォームマスターを新規作成
	 */
	public function getItem(): ?FormModelMaster {
		return $this->item;
	}

	/**
	 * 作成したフォームマスターを設定
	 *
	 * @param FormModelMaster|null $item フォームマスターを新規作成
	 */
	public function setItem(?FormModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateFormModelMasterResult {
        $result = new CreateFormModelMasterResult();
        $result->setItem(isset($data["item"]) ? FormModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}