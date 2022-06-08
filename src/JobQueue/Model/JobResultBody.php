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

namespace Gs2\JobQueue\Model;

use Gs2\Core\Model\IModel;


class JobResultBody implements IModel {
	/**
     * @var int
	 */
	private $tryNumber;
	/**
     * @var int
	 */
	private $statusCode;
	/**
     * @var string
	 */
	private $result;
	/**
     * @var int
	 */
	private $tryAt;
	public function getTryNumber(): ?int {
		return $this->tryNumber;
	}
	public function setTryNumber(?int $tryNumber) {
		$this->tryNumber = $tryNumber;
	}
	public function withTryNumber(?int $tryNumber): JobResultBody {
		$this->tryNumber = $tryNumber;
		return $this;
	}
	public function getStatusCode(): ?int {
		return $this->statusCode;
	}
	public function setStatusCode(?int $statusCode) {
		$this->statusCode = $statusCode;
	}
	public function withStatusCode(?int $statusCode): JobResultBody {
		$this->statusCode = $statusCode;
		return $this;
	}
	public function getResult(): ?string {
		return $this->result;
	}
	public function setResult(?string $result) {
		$this->result = $result;
	}
	public function withResult(?string $result): JobResultBody {
		$this->result = $result;
		return $this;
	}
	public function getTryAt(): ?int {
		return $this->tryAt;
	}
	public function setTryAt(?int $tryAt) {
		$this->tryAt = $tryAt;
	}
	public function withTryAt(?int $tryAt): JobResultBody {
		$this->tryAt = $tryAt;
		return $this;
	}

    public static function fromJson(?array $data): ?JobResultBody {
        if ($data === null) {
            return null;
        }
        return (new JobResultBody())
            ->withTryNumber(array_key_exists('tryNumber', $data) && $data['tryNumber'] !== null ? $data['tryNumber'] : null)
            ->withStatusCode(array_key_exists('statusCode', $data) && $data['statusCode'] !== null ? $data['statusCode'] : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? $data['result'] : null)
            ->withTryAt(array_key_exists('tryAt', $data) && $data['tryAt'] !== null ? $data['tryAt'] : null);
    }

    public function toJson(): array {
        return array(
            "tryNumber" => $this->getTryNumber(),
            "statusCode" => $this->getStatusCode(),
            "result" => $this->getResult(),
            "tryAt" => $this->getTryAt(),
        );
    }
}