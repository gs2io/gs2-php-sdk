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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetImportProgressRequest extends Gs2BasicRequest {
    /** @var string */
    private $transactionId;
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): GetImportProgressRequest {
		$this->transactionId = $transactionId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetImportProgressRequest {
        if ($data === null) {
            return null;
        }
        return (new GetImportProgressRequest())
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null);
    }

    public function toJson(): array {
        return array(
            "transactionId" => $this->getTransactionId(),
        );
    }
}