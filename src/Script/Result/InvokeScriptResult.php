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

class InvokeScriptResult implements IResult {
    /** @var int */
    private $code;
    /** @var string */
    private $result;
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

	public function withCode(?int $code): InvokeScriptResult {
		$this->code = $code;
		return $this;
	}

	public function getResult(): ?string {
		return $this->result;
	}

	public function setResult(?string $result) {
		$this->result = $result;
	}

	public function withResult(?string $result): InvokeScriptResult {
		$this->result = $result;
		return $this;
	}

	public function getExecuteTime(): ?int {
		return $this->executeTime;
	}

	public function setExecuteTime(?int $executeTime) {
		$this->executeTime = $executeTime;
	}

	public function withExecuteTime(?int $executeTime): InvokeScriptResult {
		$this->executeTime = $executeTime;
		return $this;
	}

	public function getCharged(): ?int {
		return $this->charged;
	}

	public function setCharged(?int $charged) {
		$this->charged = $charged;
	}

	public function withCharged(?int $charged): InvokeScriptResult {
		$this->charged = $charged;
		return $this;
	}

	public function getOutput(): ?array {
		return $this->output;
	}

	public function setOutput(?array $output) {
		$this->output = $output;
	}

	public function withOutput(?array $output): InvokeScriptResult {
		$this->output = $output;
		return $this;
	}

    public static function fromJson(?array $data): ?InvokeScriptResult {
        if ($data === null) {
            return null;
        }
        return (new InvokeScriptResult())
            ->withCode(empty($data['code']) ? null : $data['code'])
            ->withResult(empty($data['result']) ? null : $data['result'])
            ->withExecuteTime(empty($data['executeTime']) ? null : $data['executeTime'])
            ->withCharged(empty($data['charged']) ? null : $data['charged'])
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