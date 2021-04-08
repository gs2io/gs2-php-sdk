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

namespace Gs2\Stamina\Result;

use Gs2\Core\Model\IResult;
use Gs2\Stamina\Model\Stamina;
use Gs2\Stamina\Model\StaminaModel;

/**
 * ユーザIDを指定してスタミナの最大値を更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class SetMaxValueByUserIdResult implements IResult {
	/** @var Stamina スタミナ */
	private $item;
	/** @var StaminaModel スタミナモデル */
	private $staminaModel;

	/**
	 * スタミナを取得
	 *
	 * @return Stamina|null ユーザIDを指定してスタミナの最大値を更新
	 */
	public function getItem(): ?Stamina {
		return $this->item;
	}

	/**
	 * スタミナを設定
	 *
	 * @param Stamina|null $item ユーザIDを指定してスタミナの最大値を更新
	 */
	public function setItem(?Stamina $item) {
		$this->item = $item;
	}

	/**
	 * スタミナモデルを取得
	 *
	 * @return StaminaModel|null ユーザIDを指定してスタミナの最大値を更新
	 */
	public function getStaminaModel(): ?StaminaModel {
		return $this->staminaModel;
	}

	/**
	 * スタミナモデルを設定
	 *
	 * @param StaminaModel|null $staminaModel ユーザIDを指定してスタミナの最大値を更新
	 */
	public function setStaminaModel(?StaminaModel $staminaModel) {
		$this->staminaModel = $staminaModel;
	}

    public static function fromJson(array $data): SetMaxValueByUserIdResult {
        $result = new SetMaxValueByUserIdResult();
        $result->setItem(isset($data["item"]) ? Stamina::fromJson($data["item"]) : null);
        $result->setStaminaModel(isset($data["staminaModel"]) ? StaminaModel::fromJson($data["staminaModel"]) : null);
        return $result;
    }
}