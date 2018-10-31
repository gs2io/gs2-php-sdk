<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Money\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DescribeReceiptRequest extends Gs2BasicRequest {

    const FUNCTION = "DescribeReceipt";

	/** @var string 課金通貨の名前 */
	private $moneyName;

	/** @var int データの取得開始日時(エポック秒) */
	private $begin;

	/** @var int データの取得終了日時(エポック秒) */
	private $end;

	/** @var string データの取得を開始する位置を指定するトークン */
	private $pageToken;

	/** @var int データの取得件数 */
	private $limit;


	/**
	 * 課金通貨の名前を取得
	 *
	 * @return string 課金通貨の名前
	 */
	public function getMoneyName() {
		return $this->moneyName;
	}

	/**
	 * 課金通貨の名前を設定
	 *
	 * @param string $moneyName 課金通貨の名前
	 */
	public function setMoneyName($moneyName) {
		$this->moneyName = $moneyName;
	}

	/**
	 * 課金通貨の名前を設定
	 *
	 * @param string $moneyName 課金通貨の名前
	 * @return DescribeReceiptRequest
	 */
	public function withMoneyName($moneyName): DescribeReceiptRequest {
		$this->setMoneyName($moneyName);
		return $this;
	}

	/**
	 * データの取得開始日時(エポック秒)を取得
	 *
	 * @return int データの取得開始日時(エポック秒)
	 */
	public function getBegin() {
		return $this->begin;
	}

	/**
	 * データの取得開始日時(エポック秒)を設定
	 *
	 * @param int $begin データの取得開始日時(エポック秒)
	 */
	public function setBegin($begin) {
		$this->begin = $begin;
	}

	/**
	 * データの取得開始日時(エポック秒)を設定
	 *
	 * @param int $begin データの取得開始日時(エポック秒)
	 * @return DescribeReceiptRequest
	 */
	public function withBegin($begin): DescribeReceiptRequest {
		$this->setBegin($begin);
		return $this;
	}

	/**
	 * データの取得終了日時(エポック秒)を取得
	 *
	 * @return int データの取得終了日時(エポック秒)
	 */
	public function getEnd() {
		return $this->end;
	}

	/**
	 * データの取得終了日時(エポック秒)を設定
	 *
	 * @param int $end データの取得終了日時(エポック秒)
	 */
	public function setEnd($end) {
		$this->end = $end;
	}

	/**
	 * データの取得終了日時(エポック秒)を設定
	 *
	 * @param int $end データの取得終了日時(エポック秒)
	 * @return DescribeReceiptRequest
	 */
	public function withEnd($end): DescribeReceiptRequest {
		$this->setEnd($end);
		return $this;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを取得
	 *
	 * @return string データの取得を開始する位置を指定するトークン
	 */
	public function getPageToken() {
		return $this->pageToken;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを設定
	 *
	 * @param string $pageToken データの取得を開始する位置を指定するトークン
	 */
	public function setPageToken($pageToken) {
		$this->pageToken = $pageToken;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを設定
	 *
	 * @param string $pageToken データの取得を開始する位置を指定するトークン
	 * @return DescribeReceiptRequest
	 */
	public function withPageToken($pageToken): DescribeReceiptRequest {
		$this->setPageToken($pageToken);
		return $this;
	}

	/**
	 * データの取得件数を取得
	 *
	 * @return int データの取得件数
	 */
	public function getLimit() {
		return $this->limit;
	}

	/**
	 * データの取得件数を設定
	 *
	 * @param int $limit データの取得件数
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
	}

	/**
	 * データの取得件数を設定
	 *
	 * @param int $limit データの取得件数
	 * @return DescribeReceiptRequest
	 */
	public function withLimit($limit): DescribeReceiptRequest {
		$this->setLimit($limit);
		return $this;
	}

}