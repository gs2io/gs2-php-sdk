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


/**
 * Event
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#event
 */
class Event implements IModel {
	/**
     * @var string Event GRN
	 */
	private $eventId;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Event Type
	 */
	private $eventType;
	/**
     * @var VerifyReceiptEvent Verify Receipt Event
	 */
	private $verifyReceiptEvent;
	/**
     * @var DepositEvent Deposit Event
	 */
	private $depositEvent;
	/**
     * @var WithdrawEvent Withdraw Event
	 */
	private $withdrawEvent;
	/**
     * @var RefundEvent Refund Event
	 */
	private $refundEvent;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Event GRN */
	public function getEventId(): ?string {
		return $this->eventId;
	}
    /** @param string|null $eventId Event GRN */
	public function setEventId(?string $eventId) {
		$this->eventId = $eventId;
	}
    /**
     * @param string|null $eventId Event GRN
     * @return Event
     */
	public function withEventId(?string $eventId): Event {
		$this->eventId = $eventId;
		return $this;
	}
    /** @return string|null Transaction ID */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
    /** @param string|null $transactionId Transaction ID */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
    /**
     * @param string|null $transactionId Transaction ID
     * @return Event
     */
	public function withTransactionId(?string $transactionId): Event {
		$this->transactionId = $transactionId;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return Event
     */
	public function withUserId(?string $userId): Event {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Event Type */
	public function getEventType(): ?string {
		return $this->eventType;
	}
    /** @param string|null $eventType Event Type */
	public function setEventType(?string $eventType) {
		$this->eventType = $eventType;
	}
    /**
     * @param string|null $eventType Event Type
     * @return Event
     */
	public function withEventType(?string $eventType): Event {
		$this->eventType = $eventType;
		return $this;
	}
    /** @return VerifyReceiptEvent|null Verify Receipt Event */
	public function getVerifyReceiptEvent(): ?VerifyReceiptEvent {
		return $this->verifyReceiptEvent;
	}
    /** @param VerifyReceiptEvent|null $verifyReceiptEvent Verify Receipt Event */
	public function setVerifyReceiptEvent(?VerifyReceiptEvent $verifyReceiptEvent) {
		$this->verifyReceiptEvent = $verifyReceiptEvent;
	}
    /**
     * @param VerifyReceiptEvent|null $verifyReceiptEvent Verify Receipt Event
     * @return Event
     */
	public function withVerifyReceiptEvent(?VerifyReceiptEvent $verifyReceiptEvent): Event {
		$this->verifyReceiptEvent = $verifyReceiptEvent;
		return $this;
	}
    /** @return DepositEvent|null Deposit Event */
	public function getDepositEvent(): ?DepositEvent {
		return $this->depositEvent;
	}
    /** @param DepositEvent|null $depositEvent Deposit Event */
	public function setDepositEvent(?DepositEvent $depositEvent) {
		$this->depositEvent = $depositEvent;
	}
    /**
     * @param DepositEvent|null $depositEvent Deposit Event
     * @return Event
     */
	public function withDepositEvent(?DepositEvent $depositEvent): Event {
		$this->depositEvent = $depositEvent;
		return $this;
	}
    /** @return WithdrawEvent|null Withdraw Event */
	public function getWithdrawEvent(): ?WithdrawEvent {
		return $this->withdrawEvent;
	}
    /** @param WithdrawEvent|null $withdrawEvent Withdraw Event */
	public function setWithdrawEvent(?WithdrawEvent $withdrawEvent) {
		$this->withdrawEvent = $withdrawEvent;
	}
    /**
     * @param WithdrawEvent|null $withdrawEvent Withdraw Event
     * @return Event
     */
	public function withWithdrawEvent(?WithdrawEvent $withdrawEvent): Event {
		$this->withdrawEvent = $withdrawEvent;
		return $this;
	}
    /** @return RefundEvent|null Refund Event */
	public function getRefundEvent(): ?RefundEvent {
		return $this->refundEvent;
	}
    /** @param RefundEvent|null $refundEvent Refund Event */
	public function setRefundEvent(?RefundEvent $refundEvent) {
		$this->refundEvent = $refundEvent;
	}
    /**
     * @param RefundEvent|null $refundEvent Refund Event
     * @return Event
     */
	public function withRefundEvent(?RefundEvent $refundEvent): Event {
		$this->refundEvent = $refundEvent;
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
     * @return Event
     */
	public function withCreatedAt(?int $createdAt): Event {
		$this->createdAt = $createdAt;
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
     * @return Event
     */
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
            ->withRefundEvent(array_key_exists('refundEvent', $data) && $data['refundEvent'] !== null ? RefundEvent::fromJson($data['refundEvent']) : null)
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
            "refundEvent" => $this->getRefundEvent() !== null ? $this->getRefundEvent()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}