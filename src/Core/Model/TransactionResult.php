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

namespace Gs2\Core\Model;


class TransactionResult implements IModel {
	/**
     * @var string
	 */
	private $transactionId;
	/**
     * @var array
	 */
	private $verifyResults;
	/**
     * @var array
	 */
	private $consumeResults;
	/**
     * @var array
	 */
	private $acquireResults;
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): TransactionResult {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getVerifyResults(): ?array {
		return $this->verifyResults;
	}
	public function setVerifyResults(?array $verifyResults) {
		$this->verifyResults = $verifyResults;
	}
	public function withVerifyResults(?array $verifyResults): TransactionResult {
		$this->verifyResults = $verifyResults;
		return $this;
	}
	public function getConsumeResults(): ?array {
		return $this->consumeResults;
	}
	public function setConsumeResults(?array $consumeResults) {
		$this->consumeResults = $consumeResults;
	}
	public function withConsumeResults(?array $consumeResults): TransactionResult {
		$this->consumeResults = $consumeResults;
		return $this;
	}
	public function getAcquireResults(): ?array {
		return $this->acquireResults;
	}
	public function setAcquireResults(?array $acquireResults) {
		$this->acquireResults = $acquireResults;
	}
	public function withAcquireResults(?array $acquireResults): TransactionResult {
		$this->acquireResults = $acquireResults;
		return $this;
	}

    public static function fromJson(?array $data): ?TransactionResult {
        if ($data === null) {
            return null;
        }
        return (new TransactionResult())
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withVerifyResults(array_map(
                function ($item) {
                    return CoreVerifyActionResult::fromJson($item);
                },
                array_key_exists('verifyResults', $data) && $data['verifyResults'] !== null ? $data['verifyResults'] : []
            ))
            ->withConsumeResults(array_map(
                function ($item) {
                    return CoreConsumeActionResult::fromJson($item);
                },
                array_key_exists('consumeResults', $data) && $data['consumeResults'] !== null ? $data['consumeResults'] : []
            ))
            ->withAcquireResults(array_map(
                function ($item) {
                    return CoreAcquireActionResult::fromJson($item);
                },
                array_key_exists('acquireResults', $data) && $data['acquireResults'] !== null ? $data['acquireResults'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "transactionId" => $this->getTransactionId(),
            "verifyResults" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyResults() !== null && $this->getVerifyResults() !== null ? $this->getVerifyResults() : []
            ),
            "consumeResults" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeResults() !== null && $this->getConsumeResults() !== null ? $this->getConsumeResults() : []
            ),
            "acquireResults" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireResults() !== null && $this->getAcquireResults() !== null ? $this->getAcquireResults() : []
            ),
        );
    }
}