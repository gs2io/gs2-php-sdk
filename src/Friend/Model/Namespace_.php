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

namespace Gs2\Friend\Model;

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
     * @var ScriptSetting フォローされたときに実行するスクリプト
	 */
	protected $followScript;

	/**
	 * フォローされたときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null フォローされたときに実行するスクリプト
	 */
	public function getFollowScript(): ?ScriptSetting {
		return $this->followScript;
	}

	/**
	 * フォローされたときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $followScript フォローされたときに実行するスクリプト
	 */
	public function setFollowScript(?ScriptSetting $followScript) {
		$this->followScript = $followScript;
	}

	/**
	 * フォローされたときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $followScript フォローされたときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withFollowScript(?ScriptSetting $followScript): Namespace_ {
		$this->followScript = $followScript;
		return $this;
	}
	/**
     * @var ScriptSetting アンフォローされたときに実行するスクリプト
	 */
	protected $unfollowScript;

	/**
	 * アンフォローされたときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null アンフォローされたときに実行するスクリプト
	 */
	public function getUnfollowScript(): ?ScriptSetting {
		return $this->unfollowScript;
	}

	/**
	 * アンフォローされたときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $unfollowScript アンフォローされたときに実行するスクリプト
	 */
	public function setUnfollowScript(?ScriptSetting $unfollowScript) {
		$this->unfollowScript = $unfollowScript;
	}

	/**
	 * アンフォローされたときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $unfollowScript アンフォローされたときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withUnfollowScript(?ScriptSetting $unfollowScript): Namespace_ {
		$this->unfollowScript = $unfollowScript;
		return $this;
	}
	/**
     * @var ScriptSetting フレンドリクエストを発行したときに実行するスクリプト
	 */
	protected $sendRequestScript;

	/**
	 * フレンドリクエストを発行したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null フレンドリクエストを発行したときに実行するスクリプト
	 */
	public function getSendRequestScript(): ?ScriptSetting {
		return $this->sendRequestScript;
	}

	/**
	 * フレンドリクエストを発行したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $sendRequestScript フレンドリクエストを発行したときに実行するスクリプト
	 */
	public function setSendRequestScript(?ScriptSetting $sendRequestScript) {
		$this->sendRequestScript = $sendRequestScript;
	}

	/**
	 * フレンドリクエストを発行したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $sendRequestScript フレンドリクエストを発行したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withSendRequestScript(?ScriptSetting $sendRequestScript): Namespace_ {
		$this->sendRequestScript = $sendRequestScript;
		return $this;
	}
	/**
     * @var ScriptSetting フレンドリクエストをキャンセルしたときに実行するスクリプト
	 */
	protected $cancelRequestScript;

	/**
	 * フレンドリクエストをキャンセルしたときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null フレンドリクエストをキャンセルしたときに実行するスクリプト
	 */
	public function getCancelRequestScript(): ?ScriptSetting {
		return $this->cancelRequestScript;
	}

	/**
	 * フレンドリクエストをキャンセルしたときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $cancelRequestScript フレンドリクエストをキャンセルしたときに実行するスクリプト
	 */
	public function setCancelRequestScript(?ScriptSetting $cancelRequestScript) {
		$this->cancelRequestScript = $cancelRequestScript;
	}

	/**
	 * フレンドリクエストをキャンセルしたときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $cancelRequestScript フレンドリクエストをキャンセルしたときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withCancelRequestScript(?ScriptSetting $cancelRequestScript): Namespace_ {
		$this->cancelRequestScript = $cancelRequestScript;
		return $this;
	}
	/**
     * @var ScriptSetting フレンドリクエストを承諾したときに実行するスクリプト
	 */
	protected $acceptRequestScript;

	/**
	 * フレンドリクエストを承諾したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null フレンドリクエストを承諾したときに実行するスクリプト
	 */
	public function getAcceptRequestScript(): ?ScriptSetting {
		return $this->acceptRequestScript;
	}

	/**
	 * フレンドリクエストを承諾したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $acceptRequestScript フレンドリクエストを承諾したときに実行するスクリプト
	 */
	public function setAcceptRequestScript(?ScriptSetting $acceptRequestScript) {
		$this->acceptRequestScript = $acceptRequestScript;
	}

	/**
	 * フレンドリクエストを承諾したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $acceptRequestScript フレンドリクエストを承諾したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withAcceptRequestScript(?ScriptSetting $acceptRequestScript): Namespace_ {
		$this->acceptRequestScript = $acceptRequestScript;
		return $this;
	}
	/**
     * @var ScriptSetting フレンドリクエストを拒否したときに実行するスクリプト
	 */
	protected $rejectRequestScript;

	/**
	 * フレンドリクエストを拒否したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null フレンドリクエストを拒否したときに実行するスクリプト
	 */
	public function getRejectRequestScript(): ?ScriptSetting {
		return $this->rejectRequestScript;
	}

	/**
	 * フレンドリクエストを拒否したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $rejectRequestScript フレンドリクエストを拒否したときに実行するスクリプト
	 */
	public function setRejectRequestScript(?ScriptSetting $rejectRequestScript) {
		$this->rejectRequestScript = $rejectRequestScript;
	}

	/**
	 * フレンドリクエストを拒否したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $rejectRequestScript フレンドリクエストを拒否したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withRejectRequestScript(?ScriptSetting $rejectRequestScript): Namespace_ {
		$this->rejectRequestScript = $rejectRequestScript;
		return $this;
	}
	/**
     * @var ScriptSetting フレンドを削除したときに実行するスクリプト
	 */
	protected $deleteFriendScript;

	/**
	 * フレンドを削除したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null フレンドを削除したときに実行するスクリプト
	 */
	public function getDeleteFriendScript(): ?ScriptSetting {
		return $this->deleteFriendScript;
	}

	/**
	 * フレンドを削除したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $deleteFriendScript フレンドを削除したときに実行するスクリプト
	 */
	public function setDeleteFriendScript(?ScriptSetting $deleteFriendScript) {
		$this->deleteFriendScript = $deleteFriendScript;
	}

	/**
	 * フレンドを削除したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $deleteFriendScript フレンドを削除したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withDeleteFriendScript(?ScriptSetting $deleteFriendScript): Namespace_ {
		$this->deleteFriendScript = $deleteFriendScript;
		return $this;
	}
	/**
     * @var ScriptSetting プロフィールを更新したときに実行するスクリプト
	 */
	protected $updateProfileScript;

	/**
	 * プロフィールを更新したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null プロフィールを更新したときに実行するスクリプト
	 */
	public function getUpdateProfileScript(): ?ScriptSetting {
		return $this->updateProfileScript;
	}

	/**
	 * プロフィールを更新したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $updateProfileScript プロフィールを更新したときに実行するスクリプト
	 */
	public function setUpdateProfileScript(?ScriptSetting $updateProfileScript) {
		$this->updateProfileScript = $updateProfileScript;
	}

	/**
	 * プロフィールを更新したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $updateProfileScript プロフィールを更新したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withUpdateProfileScript(?ScriptSetting $updateProfileScript): Namespace_ {
		$this->updateProfileScript = $updateProfileScript;
		return $this;
	}
	/**
     * @var NotificationSetting フォローされたときのプッシュ通知
	 */
	protected $followNotification;

	/**
	 * フォローされたときのプッシュ通知を取得
	 *
	 * @return NotificationSetting|null フォローされたときのプッシュ通知
	 */
	public function getFollowNotification(): ?NotificationSetting {
		return $this->followNotification;
	}

	/**
	 * フォローされたときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $followNotification フォローされたときのプッシュ通知
	 */
	public function setFollowNotification(?NotificationSetting $followNotification) {
		$this->followNotification = $followNotification;
	}

	/**
	 * フォローされたときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $followNotification フォローされたときのプッシュ通知
	 * @return Namespace_ $this
	 */
	public function withFollowNotification(?NotificationSetting $followNotification): Namespace_ {
		$this->followNotification = $followNotification;
		return $this;
	}
	/**
     * @var NotificationSetting フレンドリクエストが届いたときのプッシュ通知
	 */
	protected $receiveRequestNotification;

	/**
	 * フレンドリクエストが届いたときのプッシュ通知を取得
	 *
	 * @return NotificationSetting|null フレンドリクエストが届いたときのプッシュ通知
	 */
	public function getReceiveRequestNotification(): ?NotificationSetting {
		return $this->receiveRequestNotification;
	}

	/**
	 * フレンドリクエストが届いたときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $receiveRequestNotification フレンドリクエストが届いたときのプッシュ通知
	 */
	public function setReceiveRequestNotification(?NotificationSetting $receiveRequestNotification) {
		$this->receiveRequestNotification = $receiveRequestNotification;
	}

	/**
	 * フレンドリクエストが届いたときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $receiveRequestNotification フレンドリクエストが届いたときのプッシュ通知
	 * @return Namespace_ $this
	 */
	public function withReceiveRequestNotification(?NotificationSetting $receiveRequestNotification): Namespace_ {
		$this->receiveRequestNotification = $receiveRequestNotification;
		return $this;
	}
	/**
     * @var NotificationSetting フレンドリクエストが承認されたときのプッシュ通知
	 */
	protected $acceptRequestNotification;

	/**
	 * フレンドリクエストが承認されたときのプッシュ通知を取得
	 *
	 * @return NotificationSetting|null フレンドリクエストが承認されたときのプッシュ通知
	 */
	public function getAcceptRequestNotification(): ?NotificationSetting {
		return $this->acceptRequestNotification;
	}

	/**
	 * フレンドリクエストが承認されたときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $acceptRequestNotification フレンドリクエストが承認されたときのプッシュ通知
	 */
	public function setAcceptRequestNotification(?NotificationSetting $acceptRequestNotification) {
		$this->acceptRequestNotification = $acceptRequestNotification;
	}

	/**
	 * フレンドリクエストが承認されたときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $acceptRequestNotification フレンドリクエストが承認されたときのプッシュ通知
	 * @return Namespace_ $this
	 */
	public function withAcceptRequestNotification(?NotificationSetting $acceptRequestNotification): Namespace_ {
		$this->acceptRequestNotification = $acceptRequestNotification;
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
     * @var string None
	 */
	protected $status;

	/**
	 * Noneを取得
	 *
	 * @return string|null None
	 */
	public function getStatus(): ?string {
		return $this->status;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $status None
	 */
	public function setStatus(?string $status) {
		$this->status = $status;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $status None
	 * @return Namespace_ $this
	 */
	public function withStatus(?string $status): Namespace_ {
		$this->status = $status;
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
            "followScript" => $this->followScript->toJson(),
            "unfollowScript" => $this->unfollowScript->toJson(),
            "sendRequestScript" => $this->sendRequestScript->toJson(),
            "cancelRequestScript" => $this->cancelRequestScript->toJson(),
            "acceptRequestScript" => $this->acceptRequestScript->toJson(),
            "rejectRequestScript" => $this->rejectRequestScript->toJson(),
            "deleteFriendScript" => $this->deleteFriendScript->toJson(),
            "updateProfileScript" => $this->updateProfileScript->toJson(),
            "followNotification" => $this->followNotification->toJson(),
            "receiveRequestNotification" => $this->receiveRequestNotification->toJson(),
            "acceptRequestNotification" => $this->acceptRequestNotification->toJson(),
            "logSetting" => $this->logSetting->toJson(),
            "status" => $this->status,
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
        $model->setFollowScript(isset($data["followScript"]) ? ScriptSetting::fromJson($data["followScript"]) : null);
        $model->setUnfollowScript(isset($data["unfollowScript"]) ? ScriptSetting::fromJson($data["unfollowScript"]) : null);
        $model->setSendRequestScript(isset($data["sendRequestScript"]) ? ScriptSetting::fromJson($data["sendRequestScript"]) : null);
        $model->setCancelRequestScript(isset($data["cancelRequestScript"]) ? ScriptSetting::fromJson($data["cancelRequestScript"]) : null);
        $model->setAcceptRequestScript(isset($data["acceptRequestScript"]) ? ScriptSetting::fromJson($data["acceptRequestScript"]) : null);
        $model->setRejectRequestScript(isset($data["rejectRequestScript"]) ? ScriptSetting::fromJson($data["rejectRequestScript"]) : null);
        $model->setDeleteFriendScript(isset($data["deleteFriendScript"]) ? ScriptSetting::fromJson($data["deleteFriendScript"]) : null);
        $model->setUpdateProfileScript(isset($data["updateProfileScript"]) ? ScriptSetting::fromJson($data["updateProfileScript"]) : null);
        $model->setFollowNotification(isset($data["followNotification"]) ? NotificationSetting::fromJson($data["followNotification"]) : null);
        $model->setReceiveRequestNotification(isset($data["receiveRequestNotification"]) ? NotificationSetting::fromJson($data["receiveRequestNotification"]) : null);
        $model->setAcceptRequestNotification(isset($data["acceptRequestNotification"]) ? NotificationSetting::fromJson($data["acceptRequestNotification"]) : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setStatus(isset($data["status"]) ? $data["status"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}