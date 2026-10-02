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

namespace Gs2\Script\Model;

use Gs2\Core\Model\IModel;


/**
 * Transaction
 *
 * @see https://docs.gs2.io/api_reference/script/sdk/#transaction
 */
class Transaction implements IModel {
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var array List of Verify Actions
	 */
	private $verifyActions;
	/**
     * @var array List of Acquire Actions
	 */
	private $consumeActions;
	/**
     * @var array List of Acquire Actions
	 */
	private $acquireActions;
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
     * @return Transaction
     */
	public function withTransactionId(?string $transactionId): Transaction {
		$this->transactionId = $transactionId;
		return $this;
	}
    /** @return array|null List of Verify Actions */
	public function getVerifyActions(): ?array {
		return $this->verifyActions;
	}
    /** @param array|null $verifyActions List of Verify Actions */
	public function setVerifyActions(?array $verifyActions) {
		$this->verifyActions = $verifyActions;
	}
    /**
     * @param array|null $verifyActions List of Verify Actions
     * @return Transaction
     */
	public function withVerifyActions(?array $verifyActions): Transaction {
		$this->verifyActions = $verifyActions;
		return $this;
	}
    /** @return array|null List of Acquire Actions */
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}
    /** @param array|null $consumeActions List of Acquire Actions */
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}
    /**
     * @param array|null $consumeActions List of Acquire Actions
     * @return Transaction
     */
	public function withConsumeActions(?array $consumeActions): Transaction {
		$this->consumeActions = $consumeActions;
		return $this;
	}
    /** @return array|null List of Acquire Actions */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
    /** @param array|null $acquireActions List of Acquire Actions */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
    /**
     * @param array|null $acquireActions List of Acquire Actions
     * @return Transaction
     */
	public function withAcquireActions(?array $acquireActions): Transaction {
		$this->acquireActions = $acquireActions;
		return $this;
	}

    public static function fromJson(?array $data): ?Transaction {
        if ($data === null) {
            return null;
        }
        return (new Transaction())
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withVerifyActions(!array_key_exists('verifyActions', $data) || $data['verifyActions'] === null ? null : array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                $data['verifyActions']
            ))
            ->withConsumeActions(!array_key_exists('consumeActions', $data) || $data['consumeActions'] === null ? null : array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                $data['consumeActions']
            ))
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
            ));
    }

    public function toJson(): array {
        return array(
            "transactionId" => $this->getTransactionId(),
            "verifyActions" => $this->getVerifyActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyActions()
            ),
            "consumeActions" => $this->getConsumeActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeActions()
            ),
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
        );
    }
}