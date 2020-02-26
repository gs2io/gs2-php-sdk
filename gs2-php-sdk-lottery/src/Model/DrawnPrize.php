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

namespace Gs2\Lottery\Model;

use Gs2\Core\Model\IModel;

/**
 * 排出された景品
 *
 * @author Game Server Services, Inc.
 *
 */
class DrawnPrize implements IModel {
	/**
     * @var AcquireAction[] 入手アクションのリスト
	 */
	protected $acquireActions;

	/**
	 * 入手アクションのリストを取得
	 *
	 * @return AcquireAction[]|null 入手アクションのリスト
	 */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}

	/**
	 * 入手アクションのリストを設定
	 *
	 * @param AcquireAction[]|null $acquireActions 入手アクションのリスト
	 */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}

	/**
	 * 入手アクションのリストを設定
	 *
	 * @param AcquireAction[]|null $acquireActions 入手アクションのリスト
	 * @return DrawnPrize $this
	 */
	public function withAcquireActions(?array $acquireActions): DrawnPrize {
		$this->acquireActions = $acquireActions;
		return $this;
	}

    public function toJson(): array {
        return array(
            "acquireActions" => array_map(
                function (AcquireAction $v) {
                    return $v->toJson();
                },
                $this->acquireActions == null ? [] : $this->acquireActions
            ),
        );
    }

    public static function fromJson(array $data): DrawnPrize {
        $model = new DrawnPrize();
        $model->setAcquireActions(array_map(
                function ($v) {
                    return AcquireAction::fromJson($v);
                },
                isset($data["acquireActions"]) ? $data["acquireActions"] : []
            )
        );
        return $model;
    }
}