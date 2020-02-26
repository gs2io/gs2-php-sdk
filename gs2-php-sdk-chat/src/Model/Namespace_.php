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

namespace Gs2\Chat\Model;

use Gs2\Core\Model\IModel;

/**
 * ネームスペース
 *
 * @author Game Server Services, Inc.
 *
 */
class Namespace_ implements IModel {
	/**
     * @var string ネームスペース
	 */
	protected $namespaceId;

	/**
	 * ネームスペースを取得
	 *
	 * @return string|null ネームスペース
	 */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 * @return Namespace_ $this
	 */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return Namespace_ $this
	 */
	public function withOwnerId(?string $ownerId): Namespace_ {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string ネームスペース名
	 */
	protected $name;

	/**
	 * ネームスペース名を取得
	 *
	 * @return string|null ネームスペース名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $name ネームスペース名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $name ネームスペース名
	 * @return Namespace_ $this
	 */
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ネームスペースの説明
	 */
	protected $description;

	/**
	 * ネームスペースの説明を取得
	 *
	 * @return string|null ネームスペースの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 * @return Namespace_ $this
	 */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	/**
     * @var bool ゲームプレイヤーによるルームの作成を許可するか
	 */
	protected $allowCreateRoom;

	/**
	 * ゲームプレイヤーによるルームの作成を許可するかを取得
	 *
	 * @return bool|null ゲームプレイヤーによるルームの作成を許可するか
	 */
	public function getAllowCreateRoom(): ?bool {
		return $this->allowCreateRoom;
	}

	/**
	 * ゲームプレイヤーによるルームの作成を許可するかを設定
	 *
	 * @param bool|null $allowCreateRoom ゲームプレイヤーによるルームの作成を許可するか
	 */
	public function setAllowCreateRoom(?bool $allowCreateRoom) {
		$this->allowCreateRoom = $allowCreateRoom;
	}

	/**
	 * ゲームプレイヤーによるルームの作成を許可するかを設定
	 *
	 * @param bool|null $allowCreateRoom ゲームプレイヤーによるルームの作成を許可するか
	 * @return Namespace_ $this
	 */
	public function withAllowCreateRoom(?bool $allowCreateRoom): Namespace_ {
		$this->allowCreateRoom = $allowCreateRoom;
		return $this;
	}
	/**
     * @var ScriptSetting メッセージを投稿したときに実行するスクリプト
	 */
	protected $postMessageScript;

	/**
	 * メッセージを投稿したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null メッセージを投稿したときに実行するスクリプト
	 */
	public function getPostMessageScript(): ?ScriptSetting {
		return $this->postMessageScript;
	}

	/**
	 * メッセージを投稿したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $postMessageScript メッセージを投稿したときに実行するスクリプト
	 */
	public function setPostMessageScript(?ScriptSetting $postMessageScript) {
		$this->postMessageScript = $postMessageScript;
	}

	/**
	 * メッセージを投稿したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $postMessageScript メッセージを投稿したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withPostMessageScript(?ScriptSetting $postMessageScript): Namespace_ {
		$this->postMessageScript = $postMessageScript;
		return $this;
	}
	/**
     * @var ScriptSetting ルームを作成したときに実行するスクリプト
	 */
	protected $createRoomScript;

	/**
	 * ルームを作成したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null ルームを作成したときに実行するスクリプト
	 */
	public function getCreateRoomScript(): ?ScriptSetting {
		return $this->createRoomScript;
	}

	/**
	 * ルームを作成したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $createRoomScript ルームを作成したときに実行するスクリプト
	 */
	public function setCreateRoomScript(?ScriptSetting $createRoomScript) {
		$this->createRoomScript = $createRoomScript;
	}

	/**
	 * ルームを作成したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $createRoomScript ルームを作成したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withCreateRoomScript(?ScriptSetting $createRoomScript): Namespace_ {
		$this->createRoomScript = $createRoomScript;
		return $this;
	}
	/**
     * @var ScriptSetting ルームを削除したときに実行するスクリプト
	 */
	protected $deleteRoomScript;

	/**
	 * ルームを削除したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null ルームを削除したときに実行するスクリプト
	 */
	public function getDeleteRoomScript(): ?ScriptSetting {
		return $this->deleteRoomScript;
	}

	/**
	 * ルームを削除したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $deleteRoomScript ルームを削除したときに実行するスクリプト
	 */
	public function setDeleteRoomScript(?ScriptSetting $deleteRoomScript) {
		$this->deleteRoomScript = $deleteRoomScript;
	}

	/**
	 * ルームを削除したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $deleteRoomScript ルームを削除したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withDeleteRoomScript(?ScriptSetting $deleteRoomScript): Namespace_ {
		$this->deleteRoomScript = $deleteRoomScript;
		return $this;
	}
	/**
     * @var ScriptSetting ルームを購読したときに実行するスクリプト
	 */
	protected $subscribeRoomScript;

	/**
	 * ルームを購読したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null ルームを購読したときに実行するスクリプト
	 */
	public function getSubscribeRoomScript(): ?ScriptSetting {
		return $this->subscribeRoomScript;
	}

	/**
	 * ルームを購読したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $subscribeRoomScript ルームを購読したときに実行するスクリプト
	 */
	public function setSubscribeRoomScript(?ScriptSetting $subscribeRoomScript) {
		$this->subscribeRoomScript = $subscribeRoomScript;
	}

	/**
	 * ルームを購読したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $subscribeRoomScript ルームを購読したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withSubscribeRoomScript(?ScriptSetting $subscribeRoomScript): Namespace_ {
		$this->subscribeRoomScript = $subscribeRoomScript;
		return $this;
	}
	/**
     * @var ScriptSetting ルームの購読を解除したときに実行するスクリプト
	 */
	protected $unsubscribeRoomScript;

	/**
	 * ルームの購読を解除したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null ルームの購読を解除したときに実行するスクリプト
	 */
	public function getUnsubscribeRoomScript(): ?ScriptSetting {
		return $this->unsubscribeRoomScript;
	}

	/**
	 * ルームの購読を解除したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $unsubscribeRoomScript ルームの購読を解除したときに実行するスクリプト
	 */
	public function setUnsubscribeRoomScript(?ScriptSetting $unsubscribeRoomScript) {
		$this->unsubscribeRoomScript = $unsubscribeRoomScript;
	}

	/**
	 * ルームの購読を解除したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $unsubscribeRoomScript ルームの購読を解除したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withUnsubscribeRoomScript(?ScriptSetting $unsubscribeRoomScript): Namespace_ {
		$this->unsubscribeRoomScript = $unsubscribeRoomScript;
		return $this;
	}
	/**
     * @var NotificationSetting 購読しているルームに新しい投稿がきたときのプッシュ通知
	 */
	protected $postNotification;

	/**
	 * 購読しているルームに新しい投稿がきたときのプッシュ通知を取得
	 *
	 * @return NotificationSetting|null 購読しているルームに新しい投稿がきたときのプッシュ通知
	 */
	public function getPostNotification(): ?NotificationSetting {
		return $this->postNotification;
	}

	/**
	 * 購読しているルームに新しい投稿がきたときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $postNotification 購読しているルームに新しい投稿がきたときのプッシュ通知
	 */
	public function setPostNotification(?NotificationSetting $postNotification) {
		$this->postNotification = $postNotification;
	}

	/**
	 * 購読しているルームに新しい投稿がきたときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $postNotification 購読しているルームに新しい投稿がきたときのプッシュ通知
	 * @return Namespace_ $this
	 */
	public function withPostNotification(?NotificationSetting $postNotification): Namespace_ {
		$this->postNotification = $postNotification;
		return $this;
	}
	/**
     * @var LogSetting ログの出力設定
	 */
	protected $logSetting;

	/**
	 * ログの出力設定を取得
	 *
	 * @return LogSetting|null ログの出力設定
	 */
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}

	/**
	 * ログの出力設定を設定
	 *
	 * @param LogSetting|null $logSetting ログの出力設定
	 */
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}

	/**
	 * ログの出力設定を設定
	 *
	 * @param LogSetting|null $logSetting ログの出力設定
	 * @return Namespace_ $this
	 */
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Namespace_ $this
	 */
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Namespace_ $this
	 */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "namespaceId" => $this->namespaceId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "description" => $this->description,
            "allowCreateRoom" => $this->allowCreateRoom,
            "postMessageScript" => $this->postMessageScript->toJson(),
            "createRoomScript" => $this->createRoomScript->toJson(),
            "deleteRoomScript" => $this->deleteRoomScript->toJson(),
            "subscribeRoomScript" => $this->subscribeRoomScript->toJson(),
            "unsubscribeRoomScript" => $this->unsubscribeRoomScript->toJson(),
            "postNotification" => $this->postNotification->toJson(),
            "logSetting" => $this->logSetting->toJson(),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Namespace_ {
        $model = new Namespace_();
        $model->setNamespaceId(isset($data["namespaceId"]) ? $data["namespaceId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setAllowCreateRoom(isset($data["allowCreateRoom"]) ? $data["allowCreateRoom"] : null);
        $model->setPostMessageScript(isset($data["postMessageScript"]) ? ScriptSetting::fromJson($data["postMessageScript"]) : null);
        $model->setCreateRoomScript(isset($data["createRoomScript"]) ? ScriptSetting::fromJson($data["createRoomScript"]) : null);
        $model->setDeleteRoomScript(isset($data["deleteRoomScript"]) ? ScriptSetting::fromJson($data["deleteRoomScript"]) : null);
        $model->setSubscribeRoomScript(isset($data["subscribeRoomScript"]) ? ScriptSetting::fromJson($data["subscribeRoomScript"]) : null);
        $model->setUnsubscribeRoomScript(isset($data["unsubscribeRoomScript"]) ? ScriptSetting::fromJson($data["unsubscribeRoomScript"]) : null);
        $model->setPostNotification(isset($data["postNotification"]) ? NotificationSetting::fromJson($data["postNotification"]) : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}