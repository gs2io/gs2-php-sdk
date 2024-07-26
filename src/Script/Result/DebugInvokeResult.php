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

class DebugInvokeResult implements IResult {
    /** @var int */
    private $code;
    /** @var string */
    private $result;
    /** @var Transaction */
    private $transaction;
    /** @var RandomStatus */
    private $randomStatus;
    /** @var int */
    private $executeTime;
    /** @var int */
    private $charged;
    /** @var array */
    private $output;

	public function getCode(): ?int {
		return $this->code;
	}

	public function setCode(?int $code) {
		$this->code = $code;
	}

	public function withCode(?int $code): DebugInvokeResult {
		$this->code = $code;
		return $this;
	}

	public function getResult(): ?string {
		return $this->result;
	}

	public function setResult(?string $result) {
		$this->result = $result;
	}

	public function withResult(?string $result): DebugInvokeResult {
		$this->result = $result;
		return $this;
	}

	public function getTransaction(): ?Transaction {
		return $this->transaction;
	}

	public function setTransaction(?Transaction $transaction) {
		$this->transaction = $transaction;
	}

	public function withTransaction(?Transaction $transaction): DebugInvokeResult {
		$this->transaction = $transaction;
		return $this;
	}

	public function getRandomStatus(): ?RandomStatus {
		return $this->randomStatus;
	}

	public function setRandomStatus(?RandomStatus $randomStatus) {
		$this->randomStatus = $randomStatus;
	}

	public function withRandomStatus(?RandomStatus $randomStatus): DebugInvokeResult {
		$this->randomStatus = $randomStatus;
		return $this;
	}

	public function getExecuteTime(): ?int {
		return $this->executeTime;
	}

	public function setExecuteTime(?int $executeTime) {
		$this->executeTime = $executeTime;
	}

	public function withExecuteTime(?int $executeTime): DebugInvokeResult {
		$this->executeTime = $executeTime;
		return $this;
	}

	public function getCharged(): ?int {
		return $this->charged;
	}

	public function setCharged(?int $charged) {
		$this->charged = $charged;
	}

	public function withCharged(?int $charged): DebugInvokeResult {
		$this->charged = $charged;
		return $this;
	}

	public function getOutput(): ?array {
		return $this->output;
	}

	public function setOutput(?array $output) {
		$this->output = $output;
	}

	public function withOutput(?array $output): DebugInvokeResult {
		$this->output = $output;
		return $this;
	}

    public static function fromJson(?array $data): ?DebugInvokeResult {
        if ($data === null) {
            return null;
        }
        return (new DebugInvokeResult())
            ->withCode(array_key_exists('code', $data) && $data['code'] !== null ? $data['code'] : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? $data['result'] : null)
            ->withTransaction(array_key_exists('transaction', $data) && $data['transaction'] !== null ? Transaction::fromJson($data['transaction']) : null)
            ->withRandomStatus(array_key_exists('randomStatus', $data) && $data['randomStatus'] !== null ? RandomStatus::fromJson($data['randomStatus']) : null)
            ->withExecuteTime(array_key_exists('executeTime', $data) && $data['executeTime'] !== null ? $data['executeTime'] : null)
            ->withCharged(array_key_exists('charged', $data) && $data['charged'] !== null ? $data['charged'] : null)
            ->withOutput(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('output', $data) && $data['output'] !== null ? $data['output'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "code" => $this->getCode(),
            "result" => $this->getResult(),
            "transaction" => $this->getTransaction() !== null ? $this->getTransaction()->toJson() : null,
            "randomStatus" => $this->getRandomStatus() !== null ? $this->getRandomStatus()->toJson() : null,
            "executeTime" => $this->getExecuteTime(),
            "charged" => $this->getCharged(),
            "output" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getOutput() !== null && $this->getOutput() !== null ? $this->getOutput() : []
            ),
        );
    }
}