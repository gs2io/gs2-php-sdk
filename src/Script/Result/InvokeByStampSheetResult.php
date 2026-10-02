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

namespace Gs2\Script\Result;

use Gs2\Core\Model\IResult;
use Gs2\Script\Model\VerifyAction;
use Gs2\Script\Model\ConsumeAction;
use Gs2\Script\Model\AcquireAction;
use Gs2\Script\Model\Transaction;
use Gs2\Script\Model\RandomUsed;
use Gs2\Script\Model\RandomStatus;
use Gs2\Core\Model\VerifyActionResult as CoreVerifyActionResult;
use Gs2\Core\Model\ConsumeActionResult as CoreConsumeActionResult;
use Gs2\Core\Model\AcquireActionResult as CoreAcquireActionResult;
use Gs2\Core\Model\TransactionResult as CoreTransactionResult;

/**
 * Result of invokeByStampSheet: Execute the script as an Acquire Action
 *
 * @see https://docs.gs2.io/api_reference/script/stamp_sheet/#gs2scriptinvokescript
 */
class InvokeByStampSheetResult implements IResult {
    /** @var int Status Code */
    private $code;
    /** @var string Result Value */
    private $result;
    /** @var Transaction Transaction */
    private $transaction;
    /** @var RandomStatus Random number status */
    private $randomStatus;
    /** @var bool Whether to commit the transaction atomically */
    private $atomicCommit;
    /** @var CoreTransactionResult Transaction Execution Result */
    private $transactionResult;
    /** @var int Script execution time (milliseconds) */
    private $executeTime;
    /** @var int Time (seconds) for which costs were calculated */
    private $charged;
    /** @var array List of contents of standard output */
    private $output;

    /** @return int|null Status Code */
	public function getCode(): ?int {
		return $this->code;
	}

    /** @param int|null $code Status Code */
	public function setCode(?int $code) {
		$this->code = $code;
	}

    /**
     * @param int|null $code Status Code
     * @return InvokeByStampSheetResult
     */
	public function withCode(?int $code): InvokeByStampSheetResult {
		$this->code = $code;
		return $this;
	}

    /** @return string|null Result Value */
	public function getResult(): ?string {
		return $this->result;
	}

    /** @param string|null $result Result Value */
	public function setResult(?string $result) {
		$this->result = $result;
	}

    /**
     * @param string|null $result Result Value
     * @return InvokeByStampSheetResult
     */
	public function withResult(?string $result): InvokeByStampSheetResult {
		$this->result = $result;
		return $this;
	}

    /** @return Transaction|null Transaction */
	public function getTransaction(): ?Transaction {
		return $this->transaction;
	}

    /** @param Transaction|null $transaction Transaction */
	public function setTransaction(?Transaction $transaction) {
		$this->transaction = $transaction;
	}

    /**
     * @param Transaction|null $transaction Transaction
     * @return InvokeByStampSheetResult
     */
	public function withTransaction(?Transaction $transaction): InvokeByStampSheetResult {
		$this->transaction = $transaction;
		return $this;
	}

    /** @return RandomStatus|null Random number status */
	public function getRandomStatus(): ?RandomStatus {
		return $this->randomStatus;
	}

    /** @param RandomStatus|null $randomStatus Random number status */
	public function setRandomStatus(?RandomStatus $randomStatus) {
		$this->randomStatus = $randomStatus;
	}

    /**
     * @param RandomStatus|null $randomStatus Random number status
     * @return InvokeByStampSheetResult
     */
	public function withRandomStatus(?RandomStatus $randomStatus): InvokeByStampSheetResult {
		$this->randomStatus = $randomStatus;
		return $this;
	}

    /** @return bool|null Whether to commit the transaction atomically */
	public function getAtomicCommit(): ?bool {
		return $this->atomicCommit;
	}

    /** @param bool|null $atomicCommit Whether to commit the transaction atomically */
	public function setAtomicCommit(?bool $atomicCommit) {
		$this->atomicCommit = $atomicCommit;
	}

    /**
     * @param bool|null $atomicCommit Whether to commit the transaction atomically
     * @return InvokeByStampSheetResult
     */
	public function withAtomicCommit(?bool $atomicCommit): InvokeByStampSheetResult {
		$this->atomicCommit = $atomicCommit;
		return $this;
	}

    /** @return CoreTransactionResult|null Transaction Execution Result */
	public function getTransactionResult(): ?CoreTransactionResult {
		return $this->transactionResult;
	}

    /** @param CoreTransactionResult|null $transactionResult Transaction Execution Result */
	public function setTransactionResult(?CoreTransactionResult $transactionResult) {
		$this->transactionResult = $transactionResult;
	}

    /**
     * @param CoreTransactionResult|null $transactionResult Transaction Execution Result
     * @return InvokeByStampSheetResult
     */
	public function withTransactionResult(?CoreTransactionResult $transactionResult): InvokeByStampSheetResult {
		$this->transactionResult = $transactionResult;
		return $this;
	}

    /** @return int|null Script execution time (milliseconds) */
	public function getExecuteTime(): ?int {
		return $this->executeTime;
	}

    /** @param int|null $executeTime Script execution time (milliseconds) */
	public function setExecuteTime(?int $executeTime) {
		$this->executeTime = $executeTime;
	}

    /**
     * @param int|null $executeTime Script execution time (milliseconds)
     * @return InvokeByStampSheetResult
     */
	public function withExecuteTime(?int $executeTime): InvokeByStampSheetResult {
		$this->executeTime = $executeTime;
		return $this;
	}

    /** @return int|null Time (seconds) for which costs were calculated */
	public function getCharged(): ?int {
		return $this->charged;
	}

    /** @param int|null $charged Time (seconds) for which costs were calculated */
	public function setCharged(?int $charged) {
		$this->charged = $charged;
	}

    /**
     * @param int|null $charged Time (seconds) for which costs were calculated
     * @return InvokeByStampSheetResult
     */
	public function withCharged(?int $charged): InvokeByStampSheetResult {
		$this->charged = $charged;
		return $this;
	}

    /** @return array|null List of contents of standard output */
	public function getOutput(): ?array {
		return $this->output;
	}

    /** @param array|null $output List of contents of standard output */
	public function setOutput(?array $output) {
		$this->output = $output;
	}

    /**
     * @param array|null $output List of contents of standard output
     * @return InvokeByStampSheetResult
     */
	public function withOutput(?array $output): InvokeByStampSheetResult {
		$this->output = $output;
		return $this;
	}

    public static function fromJson(?array $data): ?InvokeByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new InvokeByStampSheetResult())
            ->withCode(array_key_exists('code', $data) && $data['code'] !== null ? $data['code'] : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? $data['result'] : null)
            ->withTransaction(array_key_exists('transaction', $data) && $data['transaction'] !== null ? Transaction::fromJson($data['transaction']) : null)
            ->withRandomStatus(array_key_exists('randomStatus', $data) && $data['randomStatus'] !== null ? RandomStatus::fromJson($data['randomStatus']) : null)
            ->withAtomicCommit(array_key_exists('atomicCommit', $data) ? $data['atomicCommit'] : null)
            ->withTransactionResult(array_key_exists('transactionResult', $data) && $data['transactionResult'] !== null ? CoreTransactionResult::fromJson($data['transactionResult']) : null)
            ->withExecuteTime(array_key_exists('executeTime', $data) && $data['executeTime'] !== null ? $data['executeTime'] : null)
            ->withCharged(array_key_exists('charged', $data) && $data['charged'] !== null ? $data['charged'] : null)
            ->withOutput(!array_key_exists('output', $data) || $data['output'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['output']
            ));
    }

    public function toJson(): array {
        return array(
            "code" => $this->getCode(),
            "result" => $this->getResult(),
            "transaction" => $this->getTransaction() !== null ? $this->getTransaction()->toJson() : null,
            "randomStatus" => $this->getRandomStatus() !== null ? $this->getRandomStatus()->toJson() : null,
            "atomicCommit" => $this->getAtomicCommit(),
            "transactionResult" => $this->getTransactionResult() !== null ? $this->getTransactionResult()->toJson() : null,
            "executeTime" => $this->getExecuteTime(),
            "charged" => $this->getCharged(),
            "output" => $this->getOutput() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getOutput()
            ),
        );
    }
}