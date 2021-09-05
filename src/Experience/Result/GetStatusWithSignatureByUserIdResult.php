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

namespace Gs2\Experience\Result;

use Gs2\Core\Model\IResult;
use Gs2\Experience\Model\Status;

class GetStatusWithSignatureByUserIdResult implements IResult {
    /** @var Status */
    private $item;
    /** @var string */
    private $body;
    /** @var string */
    private $signature;

	public function getItem(): ?Status {
		return $this->item;
	}

	public function setItem(?Status $item) {
		$this->item = $item;
	}

	public function withItem(?Status $item): GetStatusWithSignatureByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getBody(): ?string {
		return $this->body;
	}

	public function setBody(?string $body) {
		$this->body = $body;
	}

	public function withBody(?string $body): GetStatusWithSignatureByUserIdResult {
		$this->body = $body;
		return $this;
	}

	public function getSignature(): ?string {
		return $this->signature;
	}

	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

	public function withSignature(?string $signature): GetStatusWithSignatureByUserIdResult {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?GetStatusWithSignatureByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetStatusWithSignatureByUserIdResult())
            ->withItem(empty($data['item']) ? null : Status::fromJson($data['item']))
            ->withBody(empty($data['body']) ? null : $data['body'])
            ->withSignature(empty($data['signature']) ? null : $data['signature']);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
        );
    }
}