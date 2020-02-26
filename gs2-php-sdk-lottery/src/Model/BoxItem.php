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
 * ボックスから取り出したアイテム
 *
 * @author Game Server Services, Inc.
 *
 */
class BoxItem implements IModel {
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
	 * @return BoxItem $this
	 */
	public function withAcquireActions(?array $acquireActions): BoxItem {
		$this->acquireActions = $acquireActions;
		return $this;
	}
	/**
     * @var int 残り数量
	 */
	protected $remaining;

	/**
	 * 残り数量を取得
	 *
	 * @return int|null 残り数量
	 */
	public function getRemaining(): ?int {
		return $this->remaining;
	}

	/**
	 * 残り数量を設定
	 *
	 * @param int|null $remaining 残り数量
	 */
	public function setRemaining(?int $remaining) {
		$this->remaining = $remaining;
	}

	/**
	 * 残り数量を設定
	 *
	 * @param int|null $remaining 残り数量
	 * @return BoxItem $this
	 */
	public function withRemaining(?int $remaining): BoxItem {
		$this->remaining = $remaining;
		return $this;
	}
	/**
     * @var int 初期数量
	 */
	protected $initial;

	/**
	 * 初期数量を取得
	 *
	 * @return int|null 初期数量
	 */
	public function getInitial(): ?int {
		return $this->initial;
	}

	/**
	 * 初期数量を設定
	 *
	 * @param int|null $initial 初期数量
	 */
	public function setInitial(?int $initial) {
		$this->initial = $initial;
	}

	/**
	 * 初期数量を設定
	 *
	 * @param int|null $initial 初期数量
	 * @return BoxItem $this
	 */
	public function withInitial(?int $initial): BoxItem {
		$this->initial = $initial;
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
            "remaining" => $this->remaining,
            "initial" => $this->initial,
        );
    }

    public static function fromJson(array $data): BoxItem {
        $model = new BoxItem();
        $model->setAcquireActions(array_map(
                function ($v) {
                    return AcquireAction::fromJson($v);
                },
                isset($data["acquireActions"]) ? $data["acquireActions"] : []
            )
        );
        $model->setRemaining(isset($data["remaining"]) ? $data["remaining"] : null);
        $model->setInitial(isset($data["initial"]) ? $data["initial"] : null);
        return $model;
    }
}