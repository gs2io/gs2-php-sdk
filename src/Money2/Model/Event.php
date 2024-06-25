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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


class Event implements IModel {
	/**
     * @var string
	 */
	private $eventId;
	/**
     * @var string
	 */
	private $transactionId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $eventType;
	/**
     * @var VerifyReceiptEvent
	 */
	private $verifyReceiptEvent;
	/**
     * @var DepositEvent
	 */
	private $depositEvent;
	/**
     * @var WithdrawEvent
	 */
	private $withdrawEvent;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
	public function getEventId(): ?string {
		return $this->eventId;
	}
	public function setEventId(?string $eventId) {
		$this->eventId = $eventId;
	}
	public function withEventId(?string $eventId): Event {
		$this->eventId = $eventId;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): Event {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Event {
		$this->userId = $userId;
		return $this;
	}
	public function getEventType(): ?string {
		return $this->eventType;
	}
	public function setEventType(?string $eventType) {
		$this->eventType = $eventType;
	}
	public function withEventType(?string $eventType): Event {
		$this->eventType = $eventType;
		return $this;
	}
	public function getVerifyReceiptEvent(): ?VerifyReceiptEvent {
		return $this->verifyReceiptEvent;
	}
	public function setVerifyReceiptEvent(?VerifyReceiptEvent $verifyReceiptEvent) {
		$this->verifyReceiptEvent = $verifyReceiptEvent;
	}
	public function withVerifyReceiptEvent(?VerifyReceiptEvent $verifyReceiptEvent): Event {
		$this->verifyReceiptEvent = $verifyReceiptEvent;
		return $this;
	}
	public function getDepositEvent(): ?DepositEvent {
		return $this->depositEvent;
	}
	public function setDepositEvent(?DepositEvent $depositEvent) {
		$this->depositEvent = $depositEvent;
	}
	public function withDepositEvent(?DepositEvent $depositEvent): Event {
		$this->depositEvent = $depositEvent;
		return $this;
	}
	public function getWithdrawEvent(): ?WithdrawEvent {
		return $this->withdrawEvent;
	}
	public function setWithdrawEvent(?WithdrawEvent $withdrawEvent) {
		$this->withdrawEvent = $withdrawEvent;
	}
	public function withWithdrawEvent(?WithdrawEvent $withdrawEvent): Event {
		$this->withdrawEvent = $withdrawEvent;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Event {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Event {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Event {
        if ($data === null) {
            return null;
        }
        return (new Event())
            ->withEventId(array_key_exists('eventId', $data) && $data['eventId'] !== null ? $data['eventId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withEventType(array_key_exists('eventType', $data) && $data['eventType'] !== null ? $data['eventType'] : null)
            ->withVerifyReceiptEvent(array_key_exists('verifyReceiptEvent', $data) && $data['verifyReceiptEvent'] !== null ? VerifyReceiptEvent::fromJson($data['verifyReceiptEvent']) : null)
            ->withDepositEvent(array_key_exists('depositEvent', $data) && $data['depositEvent'] !== null ? DepositEvent::fromJson($data['depositEvent']) : null)
            ->withWithdrawEvent(array_key_exists('withdrawEvent', $data) && $data['withdrawEvent'] !== null ? WithdrawEvent::fromJson($data['withdrawEvent']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "eventId" => $this->getEventId(),
            "transactionId" => $this->getTransactionId(),
            "userId" => $this->getUserId(),
            "eventType" => $this->getEventType(),
            "verifyReceiptEvent" => $this->getVerifyReceiptEvent() !== null ? $this->getVerifyReceiptEvent()->toJson() : null,
            "depositEvent" => $this->getDepositEvent() !== null ? $this->getDepositEvent()->toJson() : null,
            "withdrawEvent" => $this->getWithdrawEvent() !== null ? $this->getWithdrawEvent()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}