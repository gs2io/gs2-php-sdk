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

namespace Gs2\Inbox\Model;

use Gs2\Core\Model\IModel;

/**
 * 全ユーザに向けたメッセージ
 *
 * @author Game Server Services, Inc.
 *
 */
class GlobalMessage implements IModel {
	/**
     * @var string 全ユーザに向けたメッセージ
	 */
	protected $globalMessageId;

	/**
	 * 全ユーザに向けたメッセージを取得
	 *
	 * @return string|null 全ユーザに向けたメッセージ
	 */
	public function getGlobalMessageId(): ?string {
		return $this->globalMessageId;
	}

	/**
	 * 全ユーザに向けたメッセージを設定
	 *
	 * @param string|null $globalMessageId 全ユーザに向けたメッセージ
	 */
	public function setGlobalMessageId(?string $globalMessageId) {
		$this->globalMessageId = $globalMessageId;
	}

	/**
	 * 全ユーザに向けたメッセージを設定
	 *
	 * @param string|null $globalMessageId 全ユーザに向けたメッセージ
	 * @return GlobalMessage $this
	 */
	public function withGlobalMessageId(?string $globalMessageId): GlobalMessage {
		$this->globalMessageId = $globalMessageId;
		return $this;
	}
	/**
     * @var string 全ユーザに向けたメッセージ名
	 */
	protected $name;

	/**
	 * 全ユーザに向けたメッセージ名を取得
	 *
	 * @return string|null 全ユーザに向けたメッセージ名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 全ユーザに向けたメッセージ名を設定
	 *
	 * @param string|null $name 全ユーザに向けたメッセージ名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 全ユーザに向けたメッセージ名を設定
	 *
	 * @param string|null $name 全ユーザに向けたメッセージ名
	 * @return GlobalMessage $this
	 */
	public function withName(?string $name): GlobalMessage {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 全ユーザに向けたメッセージの内容に相当するメタデータ
	 */
	protected $metadata;

	/**
	 * 全ユーザに向けたメッセージの内容に相当するメタデータを取得
	 *
	 * @return string|null 全ユーザに向けたメッセージの内容に相当するメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 全ユーザに向けたメッセージの内容に相当するメタデータを設定
	 *
	 * @param string|null $metadata 全ユーザに向けたメッセージの内容に相当するメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 全ユーザに向けたメッセージの内容に相当するメタデータを設定
	 *
	 * @param string|null $metadata 全ユーザに向けたメッセージの内容に相当するメタデータ
	 * @return GlobalMessage $this
	 */
	public function withMetadata(?string $metadata): GlobalMessage {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var AcquireAction[] 開封時に実行する入手アクション
	 */
	protected $readAcquireActions;

	/**
	 * 開封時に実行する入手アクションを取得
	 *
	 * @return AcquireAction[]|null 開封時に実行する入手アクション
	 */
	public function getReadAcquireActions(): ?array {
		return $this->readAcquireActions;
	}

	/**
	 * 開封時に実行する入手アクションを設定
	 *
	 * @param AcquireAction[]|null $readAcquireActions 開封時に実行する入手アクション
	 */
	public function setReadAcquireActions(?array $readAcquireActions) {
		$this->readAcquireActions = $readAcquireActions;
	}

	/**
	 * 開封時に実行する入手アクションを設定
	 *
	 * @param AcquireAction[]|null $readAcquireActions 開封時に実行する入手アクション
	 * @return GlobalMessage $this
	 */
	public function withReadAcquireActions(?array $readAcquireActions): GlobalMessage {
		$this->readAcquireActions = $readAcquireActions;
		return $this;
	}
	/**
     * @var TimeSpan メッセージを受信したあとメッセージが削除されるまでの期間
	 */
	protected $expiresTimeSpan;

	/**
	 * メッセージを受信したあとメッセージが削除されるまでの期間を取得
	 *
	 * @return TimeSpan|null メッセージを受信したあとメッセージが削除されるまでの期間
	 */
	public function getExpiresTimeSpan(): ?TimeSpan {
		return $this->expiresTimeSpan;
	}

	/**
	 * メッセージを受信したあとメッセージが削除されるまでの期間を設定
	 *
	 * @param TimeSpan|null $expiresTimeSpan メッセージを受信したあとメッセージが削除されるまでの期間
	 */
	public function setExpiresTimeSpan(?TimeSpan $expiresTimeSpan) {
		$this->expiresTimeSpan = $expiresTimeSpan;
	}

	/**
	 * メッセージを受信したあとメッセージが削除されるまでの期間を設定
	 *
	 * @param TimeSpan|null $expiresTimeSpan メッセージを受信したあとメッセージが削除されるまでの期間
	 * @return GlobalMessage $this
	 */
	public function withExpiresTimeSpan(?TimeSpan $expiresTimeSpan): GlobalMessage {
		$this->expiresTimeSpan = $expiresTimeSpan;
		return $this;
	}
	/**
     * @var int 全ユーザに向けたメッセージの有効期限
	 */
	protected $expiresAt;

	/**
	 * 全ユーザに向けたメッセージの有効期限を取得
	 *
	 * @return int|null 全ユーザに向けたメッセージの有効期限
	 */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}

	/**
	 * 全ユーザに向けたメッセージの有効期限を設定
	 *
	 * @param int|null $expiresAt 全ユーザに向けたメッセージの有効期限
	 */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}

	/**
	 * 全ユーザに向けたメッセージの有効期限を設定
	 *
	 * @param int|null $expiresAt 全ユーザに向けたメッセージの有効期限
	 * @return GlobalMessage $this
	 */
	public function withExpiresAt(?int $expiresAt): GlobalMessage {
		$this->expiresAt = $expiresAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "globalMessageId" => $this->globalMessageId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "readAcquireActions" => array_map(
                function (AcquireAction $v) {
                    return $v->toJson();
                },
                $this->readAcquireActions == null ? [] : $this->readAcquireActions
            ),
            "expiresTimeSpan" => $this->expiresTimeSpan->toJson(),
            "expiresAt" => $this->expiresAt,
        );
    }

    public static function fromJson(array $data): GlobalMessage {
        $model = new GlobalMessage();
        $model->setGlobalMessageId(isset($data["globalMessageId"]) ? $data["globalMessageId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setReadAcquireActions(array_map(
                function ($v) {
                    return AcquireAction::fromJson($v);
                },
                isset($data["readAcquireActions"]) ? $data["readAcquireActions"] : []
            )
        );
        $model->setExpiresTimeSpan(isset($data["expiresTimeSpan"]) ? TimeSpan::fromJson($data["expiresTimeSpan"]) : null);
        $model->setExpiresAt(isset($data["expiresAt"]) ? $data["expiresAt"] : null);
        return $model;
    }
}