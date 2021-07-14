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


class Namespace_ implements IModel {
	/**
     * @var string
	 */
	private $namespaceId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var ScriptSetting
	 */
	private $followScript;
	/**
     * @var ScriptSetting
	 */
	private $unfollowScript;
	/**
     * @var ScriptSetting
	 */
	private $sendRequestScript;
	/**
     * @var ScriptSetting
	 */
	private $cancelRequestScript;
	/**
     * @var ScriptSetting
	 */
	private $acceptRequestScript;
	/**
     * @var ScriptSetting
	 */
	private $rejectRequestScript;
	/**
     * @var ScriptSetting
	 */
	private $deleteFriendScript;
	/**
     * @var ScriptSetting
	 */
	private $updateProfileScript;
	/**
     * @var NotificationSetting
	 */
	private $followNotification;
	/**
     * @var NotificationSetting
	 */
	private $receiveRequestNotification;
	/**
     * @var NotificationSetting
	 */
	private $acceptRequestNotification;
	/**
     * @var LogSetting
	 */
	private $logSetting;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}

	public function getFollowScript(): ?ScriptSetting {
		return $this->followScript;
	}

	public function setFollowScript(?ScriptSetting $followScript) {
		$this->followScript = $followScript;
	}

	public function withFollowScript(?ScriptSetting $followScript): Namespace_ {
		$this->followScript = $followScript;
		return $this;
	}

	public function getUnfollowScript(): ?ScriptSetting {
		return $this->unfollowScript;
	}

	public function setUnfollowScript(?ScriptSetting $unfollowScript) {
		$this->unfollowScript = $unfollowScript;
	}

	public function withUnfollowScript(?ScriptSetting $unfollowScript): Namespace_ {
		$this->unfollowScript = $unfollowScript;
		return $this;
	}

	public function getSendRequestScript(): ?ScriptSetting {
		return $this->sendRequestScript;
	}

	public function setSendRequestScript(?ScriptSetting $sendRequestScript) {
		$this->sendRequestScript = $sendRequestScript;
	}

	public function withSendRequestScript(?ScriptSetting $sendRequestScript): Namespace_ {
		$this->sendRequestScript = $sendRequestScript;
		return $this;
	}

	public function getCancelRequestScript(): ?ScriptSetting {
		return $this->cancelRequestScript;
	}

	public function setCancelRequestScript(?ScriptSetting $cancelRequestScript) {
		$this->cancelRequestScript = $cancelRequestScript;
	}

	public function withCancelRequestScript(?ScriptSetting $cancelRequestScript): Namespace_ {
		$this->cancelRequestScript = $cancelRequestScript;
		return $this;
	}

	public function getAcceptRequestScript(): ?ScriptSetting {
		return $this->acceptRequestScript;
	}

	public function setAcceptRequestScript(?ScriptSetting $acceptRequestScript) {
		$this->acceptRequestScript = $acceptRequestScript;
	}

	public function withAcceptRequestScript(?ScriptSetting $acceptRequestScript): Namespace_ {
		$this->acceptRequestScript = $acceptRequestScript;
		return $this;
	}

	public function getRejectRequestScript(): ?ScriptSetting {
		return $this->rejectRequestScript;
	}

	public function setRejectRequestScript(?ScriptSetting $rejectRequestScript) {
		$this->rejectRequestScript = $rejectRequestScript;
	}

	public function withRejectRequestScript(?ScriptSetting $rejectRequestScript): Namespace_ {
		$this->rejectRequestScript = $rejectRequestScript;
		return $this;
	}

	public function getDeleteFriendScript(): ?ScriptSetting {
		return $this->deleteFriendScript;
	}

	public function setDeleteFriendScript(?ScriptSetting $deleteFriendScript) {
		$this->deleteFriendScript = $deleteFriendScript;
	}

	public function withDeleteFriendScript(?ScriptSetting $deleteFriendScript): Namespace_ {
		$this->deleteFriendScript = $deleteFriendScript;
		return $this;
	}

	public function getUpdateProfileScript(): ?ScriptSetting {
		return $this->updateProfileScript;
	}

	public function setUpdateProfileScript(?ScriptSetting $updateProfileScript) {
		$this->updateProfileScript = $updateProfileScript;
	}

	public function withUpdateProfileScript(?ScriptSetting $updateProfileScript): Namespace_ {
		$this->updateProfileScript = $updateProfileScript;
		return $this;
	}

	public function getFollowNotification(): ?NotificationSetting {
		return $this->followNotification;
	}

	public function setFollowNotification(?NotificationSetting $followNotification) {
		$this->followNotification = $followNotification;
	}

	public function withFollowNotification(?NotificationSetting $followNotification): Namespace_ {
		$this->followNotification = $followNotification;
		return $this;
	}

	public function getReceiveRequestNotification(): ?NotificationSetting {
		return $this->receiveRequestNotification;
	}

	public function setReceiveRequestNotification(?NotificationSetting $receiveRequestNotification) {
		$this->receiveRequestNotification = $receiveRequestNotification;
	}

	public function withReceiveRequestNotification(?NotificationSetting $receiveRequestNotification): Namespace_ {
		$this->receiveRequestNotification = $receiveRequestNotification;
		return $this;
	}

	public function getAcceptRequestNotification(): ?NotificationSetting {
		return $this->acceptRequestNotification;
	}

	public function setAcceptRequestNotification(?NotificationSetting $acceptRequestNotification) {
		$this->acceptRequestNotification = $acceptRequestNotification;
	}

	public function withAcceptRequestNotification(?NotificationSetting $acceptRequestNotification): Namespace_ {
		$this->acceptRequestNotification = $acceptRequestNotification;
		return $this;
	}

	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}

	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}

	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Namespace_ {
        if ($data === null) {
            return null;
        }
        return (new Namespace_())
            ->withNamespaceId(empty($data['namespaceId']) ? null : $data['namespaceId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withFollowScript(empty($data['followScript']) ? null : ScriptSetting::fromJson($data['followScript']))
            ->withUnfollowScript(empty($data['unfollowScript']) ? null : ScriptSetting::fromJson($data['unfollowScript']))
            ->withSendRequestScript(empty($data['sendRequestScript']) ? null : ScriptSetting::fromJson($data['sendRequestScript']))
            ->withCancelRequestScript(empty($data['cancelRequestScript']) ? null : ScriptSetting::fromJson($data['cancelRequestScript']))
            ->withAcceptRequestScript(empty($data['acceptRequestScript']) ? null : ScriptSetting::fromJson($data['acceptRequestScript']))
            ->withRejectRequestScript(empty($data['rejectRequestScript']) ? null : ScriptSetting::fromJson($data['rejectRequestScript']))
            ->withDeleteFriendScript(empty($data['deleteFriendScript']) ? null : ScriptSetting::fromJson($data['deleteFriendScript']))
            ->withUpdateProfileScript(empty($data['updateProfileScript']) ? null : ScriptSetting::fromJson($data['updateProfileScript']))
            ->withFollowNotification(empty($data['followNotification']) ? null : NotificationSetting::fromJson($data['followNotification']))
            ->withReceiveRequestNotification(empty($data['receiveRequestNotification']) ? null : NotificationSetting::fromJson($data['receiveRequestNotification']))
            ->withAcceptRequestNotification(empty($data['acceptRequestNotification']) ? null : NotificationSetting::fromJson($data['acceptRequestNotification']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']))
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
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
            "acceptRequestNotification" => $this->getAcceptRequestNotification() !== null ? $this->getAcceptRequestNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}