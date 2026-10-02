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
 * Namespace
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#namespace
 */
class Namespace_ implements IModel {
	/**
     * @var string Namespace GRN
	 */
	private $namespaceId;
	/**
     * @var string Namespace name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var TransactionSetting Transaction Setting
	 */
	private $transactionSetting;
	/**
     * @var TransactionSettingV2 Transaction Setting (V2)
	 */
	private $transactionSettingV2;
	/**
     * @var ScriptSetting Script setting to be executed when followed
	 */
	private $followScript;
	/**
     * @var ScriptSetting Script setting to be executed when unfollowed
	 */
	private $unfollowScript;
	/**
     * @var ScriptSetting Script setting to be executed when a friend request is issued
	 */
	private $sendRequestScript;
	/**
     * @var ScriptSetting Script setting to execute when a friend request is canceled
	 */
	private $cancelRequestScript;
	/**
     * @var ScriptSetting Script setting to be executed when a friend request is accepted
	 */
	private $acceptRequestScript;
	/**
     * @var ScriptSetting Script setting to execute when a friend request is rejected
	 */
	private $rejectRequestScript;
	/**
     * @var ScriptSetting Script setting to be executed when a friend is deleted
	 */
	private $deleteFriendScript;
	/**
     * @var ScriptSetting Script setting to be executed when a profile is updated
	 */
	private $updateProfileScript;
	/**
     * @var NotificationSetting Push notification when followed
	 */
	private $followNotification;
	/**
     * @var NotificationSetting Push notification when a friend request is received
	 */
	private $receiveRequestNotification;
	/**
     * @var NotificationSetting Push notification when a received friend request is canceled
	 */
	private $cancelRequestNotification;
	/**
     * @var NotificationSetting Push notification when a friend request is approved
	 */
	private $acceptRequestNotification;
	/**
     * @var NotificationSetting Push notification when a friend request is rejected
	 */
	private $rejectRequestNotification;
	/**
     * @var NotificationSetting Push notification when a friend is deleted
	 */
	private $deleteFriendNotification;
	/**
     * @var LogSetting Log Output Setting
	 */
	private $logSetting;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Namespace GRN */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
    /** @param string|null $namespaceId Namespace GRN */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
    /**
     * @param string|null $namespaceId Namespace GRN
     * @return Namespace_
     */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
    /** @return string|null Namespace name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Namespace name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Namespace name
     * @return Namespace_
     */
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return Namespace_
     */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
    /**
     * @return TransactionSetting|null Transaction Setting
     * @deprecated
     */
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Setting
     * @deprecated
     */
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Setting
     * @return Namespace_
     * @deprecated
     */
	public function withTransactionSetting(?TransactionSetting $transactionSetting): Namespace_ {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
    /** @return TransactionSettingV2|null Transaction Setting (V2) */
	public function getTransactionSettingV2(): ?TransactionSettingV2 {
		return $this->transactionSettingV2;
	}
    /** @param TransactionSettingV2|null $transactionSettingV2 Transaction Setting (V2) */
	public function setTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2) {
		$this->transactionSettingV2 = $transactionSettingV2;
	}
    /**
     * @param TransactionSettingV2|null $transactionSettingV2 Transaction Setting (V2)
     * @return Namespace_
     */
	public function withTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2): Namespace_ {
		$this->transactionSettingV2 = $transactionSettingV2;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when followed */
	public function getFollowScript(): ?ScriptSetting {
		return $this->followScript;
	}
    /** @param ScriptSetting|null $followScript Script setting to be executed when followed */
	public function setFollowScript(?ScriptSetting $followScript) {
		$this->followScript = $followScript;
	}
    /**
     * @param ScriptSetting|null $followScript Script setting to be executed when followed
     * @return Namespace_
     */
	public function withFollowScript(?ScriptSetting $followScript): Namespace_ {
		$this->followScript = $followScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when unfollowed */
	public function getUnfollowScript(): ?ScriptSetting {
		return $this->unfollowScript;
	}
    /** @param ScriptSetting|null $unfollowScript Script setting to be executed when unfollowed */
	public function setUnfollowScript(?ScriptSetting $unfollowScript) {
		$this->unfollowScript = $unfollowScript;
	}
    /**
     * @param ScriptSetting|null $unfollowScript Script setting to be executed when unfollowed
     * @return Namespace_
     */
	public function withUnfollowScript(?ScriptSetting $unfollowScript): Namespace_ {
		$this->unfollowScript = $unfollowScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a friend request is issued */
	public function getSendRequestScript(): ?ScriptSetting {
		return $this->sendRequestScript;
	}
    /** @param ScriptSetting|null $sendRequestScript Script setting to be executed when a friend request is issued */
	public function setSendRequestScript(?ScriptSetting $sendRequestScript) {
		$this->sendRequestScript = $sendRequestScript;
	}
    /**
     * @param ScriptSetting|null $sendRequestScript Script setting to be executed when a friend request is issued
     * @return Namespace_
     */
	public function withSendRequestScript(?ScriptSetting $sendRequestScript): Namespace_ {
		$this->sendRequestScript = $sendRequestScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when a friend request is canceled */
	public function getCancelRequestScript(): ?ScriptSetting {
		return $this->cancelRequestScript;
	}
    /** @param ScriptSetting|null $cancelRequestScript Script setting to execute when a friend request is canceled */
	public function setCancelRequestScript(?ScriptSetting $cancelRequestScript) {
		$this->cancelRequestScript = $cancelRequestScript;
	}
    /**
     * @param ScriptSetting|null $cancelRequestScript Script setting to execute when a friend request is canceled
     * @return Namespace_
     */
	public function withCancelRequestScript(?ScriptSetting $cancelRequestScript): Namespace_ {
		$this->cancelRequestScript = $cancelRequestScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a friend request is accepted */
	public function getAcceptRequestScript(): ?ScriptSetting {
		return $this->acceptRequestScript;
	}
    /** @param ScriptSetting|null $acceptRequestScript Script setting to be executed when a friend request is accepted */
	public function setAcceptRequestScript(?ScriptSetting $acceptRequestScript) {
		$this->acceptRequestScript = $acceptRequestScript;
	}
    /**
     * @param ScriptSetting|null $acceptRequestScript Script setting to be executed when a friend request is accepted
     * @return Namespace_
     */
	public function withAcceptRequestScript(?ScriptSetting $acceptRequestScript): Namespace_ {
		$this->acceptRequestScript = $acceptRequestScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when a friend request is rejected */
	public function getRejectRequestScript(): ?ScriptSetting {
		return $this->rejectRequestScript;
	}
    /** @param ScriptSetting|null $rejectRequestScript Script setting to execute when a friend request is rejected */
	public function setRejectRequestScript(?ScriptSetting $rejectRequestScript) {
		$this->rejectRequestScript = $rejectRequestScript;
	}
    /**
     * @param ScriptSetting|null $rejectRequestScript Script setting to execute when a friend request is rejected
     * @return Namespace_
     */
	public function withRejectRequestScript(?ScriptSetting $rejectRequestScript): Namespace_ {
		$this->rejectRequestScript = $rejectRequestScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a friend is deleted */
	public function getDeleteFriendScript(): ?ScriptSetting {
		return $this->deleteFriendScript;
	}
    /** @param ScriptSetting|null $deleteFriendScript Script setting to be executed when a friend is deleted */
	public function setDeleteFriendScript(?ScriptSetting $deleteFriendScript) {
		$this->deleteFriendScript = $deleteFriendScript;
	}
    /**
     * @param ScriptSetting|null $deleteFriendScript Script setting to be executed when a friend is deleted
     * @return Namespace_
     */
	public function withDeleteFriendScript(?ScriptSetting $deleteFriendScript): Namespace_ {
		$this->deleteFriendScript = $deleteFriendScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a profile is updated */
	public function getUpdateProfileScript(): ?ScriptSetting {
		return $this->updateProfileScript;
	}
    /** @param ScriptSetting|null $updateProfileScript Script setting to be executed when a profile is updated */
	public function setUpdateProfileScript(?ScriptSetting $updateProfileScript) {
		$this->updateProfileScript = $updateProfileScript;
	}
    /**
     * @param ScriptSetting|null $updateProfileScript Script setting to be executed when a profile is updated
     * @return Namespace_
     */
	public function withUpdateProfileScript(?ScriptSetting $updateProfileScript): Namespace_ {
		$this->updateProfileScript = $updateProfileScript;
		return $this;
	}
    /** @return NotificationSetting|null Push notification when followed */
	public function getFollowNotification(): ?NotificationSetting {
		return $this->followNotification;
	}
    /** @param NotificationSetting|null $followNotification Push notification when followed */
	public function setFollowNotification(?NotificationSetting $followNotification) {
		$this->followNotification = $followNotification;
	}
    /**
     * @param NotificationSetting|null $followNotification Push notification when followed
     * @return Namespace_
     */
	public function withFollowNotification(?NotificationSetting $followNotification): Namespace_ {
		$this->followNotification = $followNotification;
		return $this;
	}
    /** @return NotificationSetting|null Push notification when a friend request is received */
	public function getReceiveRequestNotification(): ?NotificationSetting {
		return $this->receiveRequestNotification;
	}
    /** @param NotificationSetting|null $receiveRequestNotification Push notification when a friend request is received */
	public function setReceiveRequestNotification(?NotificationSetting $receiveRequestNotification) {
		$this->receiveRequestNotification = $receiveRequestNotification;
	}
    /**
     * @param NotificationSetting|null $receiveRequestNotification Push notification when a friend request is received
     * @return Namespace_
     */
	public function withReceiveRequestNotification(?NotificationSetting $receiveRequestNotification): Namespace_ {
		$this->receiveRequestNotification = $receiveRequestNotification;
		return $this;
	}
    /** @return NotificationSetting|null Push notification when a received friend request is canceled */
	public function getCancelRequestNotification(): ?NotificationSetting {
		return $this->cancelRequestNotification;
	}
    /** @param NotificationSetting|null $cancelRequestNotification Push notification when a received friend request is canceled */
	public function setCancelRequestNotification(?NotificationSetting $cancelRequestNotification) {
		$this->cancelRequestNotification = $cancelRequestNotification;
	}
    /**
     * @param NotificationSetting|null $cancelRequestNotification Push notification when a received friend request is canceled
     * @return Namespace_
     */
	public function withCancelRequestNotification(?NotificationSetting $cancelRequestNotification): Namespace_ {
		$this->cancelRequestNotification = $cancelRequestNotification;
		return $this;
	}
    /** @return NotificationSetting|null Push notification when a friend request is approved */
	public function getAcceptRequestNotification(): ?NotificationSetting {
		return $this->acceptRequestNotification;
	}
    /** @param NotificationSetting|null $acceptRequestNotification Push notification when a friend request is approved */
	public function setAcceptRequestNotification(?NotificationSetting $acceptRequestNotification) {
		$this->acceptRequestNotification = $acceptRequestNotification;
	}
    /**
     * @param NotificationSetting|null $acceptRequestNotification Push notification when a friend request is approved
     * @return Namespace_
     */
	public function withAcceptRequestNotification(?NotificationSetting $acceptRequestNotification): Namespace_ {
		$this->acceptRequestNotification = $acceptRequestNotification;
		return $this;
	}
    /** @return NotificationSetting|null Push notification when a friend request is rejected */
	public function getRejectRequestNotification(): ?NotificationSetting {
		return $this->rejectRequestNotification;
	}
    /** @param NotificationSetting|null $rejectRequestNotification Push notification when a friend request is rejected */
	public function setRejectRequestNotification(?NotificationSetting $rejectRequestNotification) {
		$this->rejectRequestNotification = $rejectRequestNotification;
	}
    /**
     * @param NotificationSetting|null $rejectRequestNotification Push notification when a friend request is rejected
     * @return Namespace_
     */
	public function withRejectRequestNotification(?NotificationSetting $rejectRequestNotification): Namespace_ {
		$this->rejectRequestNotification = $rejectRequestNotification;
		return $this;
	}
    /** @return NotificationSetting|null Push notification when a friend is deleted */
	public function getDeleteFriendNotification(): ?NotificationSetting {
		return $this->deleteFriendNotification;
	}
    /** @param NotificationSetting|null $deleteFriendNotification Push notification when a friend is deleted */
	public function setDeleteFriendNotification(?NotificationSetting $deleteFriendNotification) {
		$this->deleteFriendNotification = $deleteFriendNotification;
	}
    /**
     * @param NotificationSetting|null $deleteFriendNotification Push notification when a friend is deleted
     * @return Namespace_
     */
	public function withDeleteFriendNotification(?NotificationSetting $deleteFriendNotification): Namespace_ {
		$this->deleteFriendNotification = $deleteFriendNotification;
		return $this;
	}
    /** @return LogSetting|null Log Output Setting */
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
    /** @param LogSetting|null $logSetting Log Output Setting */
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
    /**
     * @param LogSetting|null $logSetting Log Output Setting
     * @return Namespace_
     */
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Namespace_
     */
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Namespace_
     */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Namespace_
     */
	public function withRevision(?int $revision): Namespace_ {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Namespace_ {
        if ($data === null) {
            return null;
        }
        return (new Namespace_())
            ->withNamespaceId(array_key_exists('namespaceId', $data) && $data['namespaceId'] !== null ? $data['namespaceId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withFollowScript(array_key_exists('followScript', $data) && $data['followScript'] !== null ? ScriptSetting::fromJson($data['followScript']) : null)
            ->withUnfollowScript(array_key_exists('unfollowScript', $data) && $data['unfollowScript'] !== null ? ScriptSetting::fromJson($data['unfollowScript']) : null)
            ->withSendRequestScript(array_key_exists('sendRequestScript', $data) && $data['sendRequestScript'] !== null ? ScriptSetting::fromJson($data['sendRequestScript']) : null)
            ->withCancelRequestScript(array_key_exists('cancelRequestScript', $data) && $data['cancelRequestScript'] !== null ? ScriptSetting::fromJson($data['cancelRequestScript']) : null)
            ->withAcceptRequestScript(array_key_exists('acceptRequestScript', $data) && $data['acceptRequestScript'] !== null ? ScriptSetting::fromJson($data['acceptRequestScript']) : null)
            ->withRejectRequestScript(array_key_exists('rejectRequestScript', $data) && $data['rejectRequestScript'] !== null ? ScriptSetting::fromJson($data['rejectRequestScript']) : null)
            ->withDeleteFriendScript(array_key_exists('deleteFriendScript', $data) && $data['deleteFriendScript'] !== null ? ScriptSetting::fromJson($data['deleteFriendScript']) : null)
            ->withUpdateProfileScript(array_key_exists('updateProfileScript', $data) && $data['updateProfileScript'] !== null ? ScriptSetting::fromJson($data['updateProfileScript']) : null)
            ->withFollowNotification(array_key_exists('followNotification', $data) && $data['followNotification'] !== null ? NotificationSetting::fromJson($data['followNotification']) : null)
            ->withReceiveRequestNotification(array_key_exists('receiveRequestNotification', $data) && $data['receiveRequestNotification'] !== null ? NotificationSetting::fromJson($data['receiveRequestNotification']) : null)
            ->withCancelRequestNotification(array_key_exists('cancelRequestNotification', $data) && $data['cancelRequestNotification'] !== null ? NotificationSetting::fromJson($data['cancelRequestNotification']) : null)
            ->withAcceptRequestNotification(array_key_exists('acceptRequestNotification', $data) && $data['acceptRequestNotification'] !== null ? NotificationSetting::fromJson($data['acceptRequestNotification']) : null)
            ->withRejectRequestNotification(array_key_exists('rejectRequestNotification', $data) && $data['rejectRequestNotification'] !== null ? NotificationSetting::fromJson($data['rejectRequestNotification']) : null)
            ->withDeleteFriendNotification(array_key_exists('deleteFriendNotification', $data) && $data['deleteFriendNotification'] !== null ? NotificationSetting::fromJson($data['deleteFriendNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "followScript" => $this->getFollowScript() !== null ? $this->getFollowScript()->toJson() : null,
            "unfollowScript" => $this->getUnfollowScript() !== null ? $this->getUnfollowScript()->toJson() : null,
            "sendRequestScript" => $this->getSendRequestScript() !== null ? $this->getSendRequestScript()->toJson() : null,
            "cancelRequestScript" => $this->getCancelRequestScript() !== null ? $this->getCancelRequestScript()->toJson() : null,
            "acceptRequestScript" => $this->getAcceptRequestScript() !== null ? $this->getAcceptRequestScript()->toJson() : null,
            "rejectRequestScript" => $this->getRejectRequestScript() !== null ? $this->getRejectRequestScript()->toJson() : null,
            "deleteFriendScript" => $this->getDeleteFriendScript() !== null ? $this->getDeleteFriendScript()->toJson() : null,
            "updateProfileScript" => $this->getUpdateProfileScript() !== null ? $this->getUpdateProfileScript()->toJson() : null,
            "followNotification" => $this->getFollowNotification() !== null ? $this->getFollowNotification()->toJson() : null,
            "receiveRequestNotification" => $this->getReceiveRequestNotification() !== null ? $this->getReceiveRequestNotification()->toJson() : null,
            "cancelRequestNotification" => $this->getCancelRequestNotification() !== null ? $this->getCancelRequestNotification()->toJson() : null,
            "acceptRequestNotification" => $this->getAcceptRequestNotification() !== null ? $this->getAcceptRequestNotification()->toJson() : null,
            "rejectRequestNotification" => $this->getRejectRequestNotification() !== null ? $this->getRejectRequestNotification()->toJson() : null,
            "deleteFriendNotification" => $this->getDeleteFriendNotification() !== null ? $this->getDeleteFriendNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}